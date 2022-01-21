<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use Bitrix\Main\Loader;

class QsoftStoresComponent extends CBitrixComponent
{
    public function onPrepareComponentParams(array $arParams) : array
    {
        $arParams['IBLOCK_ID'] = (! empty($arParams['IBLOCK_ID'])) ? (int) $arParams['IBLOCK_ID'] : 4;
        $arParams['CACHE_TIME'] = (! empty($arParams['CACHE_TIME'])) ? (int) $arParams['CACHE_TIME'] : 3600;
        $arParams['CACHE_TIME'] = ($arParams['CACHE_TIME'] > 0) ? $arParams['CACHE_TIME'] : 3600;

        $arParams['DETAILS_URL'] = (! empty($arParams['DETAILS_URL'])) ? htmlspecialcharsbx(trim($arParams['DETAILS_URL'])) : '';
        $arParams['SORT_BY'] = (! empty($arParams['SORT_BY'])) ? $arParams['SORT_BY'] : 'RAND';
        $arParams['SORT_ORDER'] = (! empty($arParams['SORT_ORDER'])) ? $arParams['SORT_ORDER'] : 'DESC';
        $arParams['SHOW_MAP'] = (isset($arParams['SHOW_MAP']) && $arParams['SHOW_MAP'] === 'Y');

        if ($arParams['ELEMENT_LIMIT'] = ! (isset($arParams['ELEMENT_LIMIT']) && $arParams['ELEMENT_LIMIT'] === 'N')) {
            $arParams['ELEMENT_COUNT'] = (! empty($arParams['ELEMENT_COUNT'])) ? (int) $arParams['ELEMENT_COUNT'] : 2;
            $arParams['ELEMENT_COUNT'] = ($arParams['ELEMENT_COUNT'] > 0) ? $arParams['ELEMENT_COUNT'] : 2;
        }

        return $arParams;
    }

    public function executeComponent()
    {
        $showButt = $this->getComponentButtons();

        if ($this->startResultCache(false, $showButt)) {
            if (! Loader::includeModule('iblock')) {
                $this->abortResultCache();
                return;
            }

            $this->arResult = $this->getDBResponse($this->getDBParams());

            if (! empty($this->arResult['ITEMS'])) {

                $this->arResult = $this->getElementsImage();
                $this->arResult = $this->getElementsButtons($showButt);
                $this->arResult = $this->getMapSettings();

                $this->setResultCacheKeys(['MAP_SETTINGS']);
                $this->IncludeComponentTemplate();
            }
        }
    }

    protected function getComponentButtons() : bool
    {
        global $APPLICATION;

        if ($show = $APPLICATION->GetShowIncludeAreas()) {
            if (Loader::includeModule('iblock')) {
                $componentButtons = \CIBlock::GetPanelButtons($this->arParams['IBLOCK_ID'], 0, 0, $this->getButtonsOptions());
                $this->addIncludeAreaIcons(\CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $componentButtons));
            }
        }
        return $show;
    }

    protected function getElementsButtons(bool $mod) : array
    {
        if ($mod) {
            foreach ($this->arResult['ITEMS'] as $id => &$bottItem) {
                $elementButtons = \CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], $id, 0, $this->getButtonsOptions());
                $bottItem['EDIT_LINK'] = $elementButtons['edit']['edit_element']['ACTION_URL'];
                $bottItem['DELETE_LINK'] = $elementButtons['edit']['delete_element']['ACTION_URL'];
            }
        }

        return $this->arResult;
    }

    protected function getButtonsOptions(bool $sectionButtons = false, bool $sessID = false, bool $reset = false) : array
    {
        static $options = null;

        if ($reset || $options === null) {
            $options = ['SECTION_BUTTONS' => $sectionButtons, 'SESSID' => $sessID];
            return $options;
        }
        return $options;
    }

    protected function getDBResponse(array $paramsDB) : array
    {
        if ($requestDB = \CIBlockElement::GetList($paramsDB['order'], $paramsDB['filter'], $paramsDB['groupBy'], $paramsDB['navParams'], $paramsDB['selectFields'])) {
            $responseDB = [];
            while ($responseDB = $requestDB->GetNext()) {
                $this->arResult['ITEMS'][$responseDB['ID']] = $responseDB;

                $this->arResult['ITEMS'][$responseDB['ID']]['EDIT_LINK'] = '';
                $this->arResult['ITEMS'][$responseDB['ID']]['DELETE_LINK'] = '';

                if (isset($responseDB['PREVIEW_PICTURE'])) {
                    $this->arResult['IMG_FILTER'][] = $responseDB['PREVIEW_PICTURE'];
                }
            }
        }

        return $this->arResult;
    }

    protected function getDBParams() : array
    {
        $paramsDB = [];

        $paramsDB['order'] = [$this->arParams['SORT_BY'] => $this->arParams['SORT_ORDER']];
        $paramsDB['filter'] = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
            'ACTIVE' => 'Y',
        ];
        $paramsDB['groupBy'] = false;
        $paramsDB['navParams'] = $this->arParams['ELEMENT_LIMIT'] ? ['nTopCount' => $this->arParams['ELEMENT_COUNT']] : false;
        $paramsDB['selectFields'] = [
            'IBLOCK_ID',
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PAGE_URL',
            'PROPERTY_WORK_HOURS',
            'PROPERTY_PHONE',
            'PROPERTY_ADDRESS',
        ];
        if ($this->arParams['SHOW_MAP']) {
            $paramsDB['selectFields'][] = 'PROPERTY_MAP';
        }

        return $paramsDB;
    }

    protected function getElementsImage() : array
    {
        if (! empty($this->arResult['IMG_FILTER'])) {
            if ($requestFilesDB = \CFile::GetList([], ['MODULE_ID' => 'iblock', '@ID' => $this->arResult['IMG_FILTER']])) {
                $imagesSRC = [];
                while ($responseFilesDB = $requestFilesDB->GetNext()) {
                    $imagesSRC[$responseFilesDB['~ID']] = \CFile::GetFileSRC($responseFilesDB);
                }
            }
        }
        foreach ($this->arResult['ITEMS'] as &$imgElement) {
            $imgElement['PREVIEW_PICTURE'] = $imagesSRC[$imgElement['PREVIEW_PICTURE']] ?? NO_IMAGE_PATH;
        }

        return $this->arResult;
    }

    protected function getMapSettings() : array
    {
        if ($this->arParams['SHOW_MAP']) {
            $settings = [];
            $lat = [];
            $lon = [];
            foreach ($this->arResult['ITEMS'] as $item) {
                if (! empty($item['PROPERTY_MAP_VALUE'])) {
                    $mark = explode(',', $item['PROPERTY_MAP_VALUE']);
                    $lat[] = (float) $mark[0];
                    $lon[] = (float) $mark[1];
                    $settings['PLACEMARKS'][] = ['LAT' => $mark[0], 'LON' => $mark[1], 'TEXT' => $item['PROPERTY_ADDRESS_VALUE']];
                }
            }
            $settings['yandex_scale'] = 11;
            $settings['yandex_lat'] = ! empty($lat) ? (array_sum($lat) / count($lat)) : 55.75;
            $settings['yandex_lon'] = ! empty($lon) ? (array_sum($lon) / count($lon)) : 37.62;

            $this->arResult['MAP_SETTINGS'] = serialize($settings);
        }

        return $this->arResult;
    }
}
