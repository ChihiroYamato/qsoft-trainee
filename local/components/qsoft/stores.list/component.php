<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use Bitrix\Main\Loader;

// Initializing params before cache
$arParams['IBLOCK_ID'] = (! empty($arParams['IBLOCK_ID'])) ? (int) $arParams['IBLOCK_ID'] : 4;
$arParams['CACHE_TIME'] = (! empty($arParams['CACHE_TIME'])) ? (int) $arParams['CACHE_TIME'] : 3600;
$arParams['CACHE_TIME'] = ($arParams['CACHE_TIME'] > 0) ? $arParams['CACHE_TIME'] : 3600;

// Component bottons
$buttons = [];
if ($buttons['show'] = $APPLICATION->GetShowIncludeAreas()) {
    $buttons['options'] = ['SECTION_BUTTONS' => false, 'SESSID' => false];
    if (Loader::includeModule('iblock')) {
        $componentButtons = \CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, 0, $buttons['options']);
        $this->addIncludeAreaIcons(\CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $componentButtons));
    }
}

if ($this->startResultCache(false, $buttons['show'])) {
    if (! Loader::includeModule('iblock')) {
        $this->abortResultCache();
        return;
    }

    // Initializing params after cache
    $arParams['DETAILS_URL'] = (! empty($arParams['DETAILS_URL'])) ? htmlspecialcharsbx(trim($arParams['DETAILS_URL'])) : '';
    $arParams['SORT_BY'] = (! empty($arParams['SORT_BY'])) ? $arParams['SORT_BY'] : 'RAND';
    $arParams['SORT_ORDER'] = (! empty($arParams['SORT_ORDER'])) ? $arParams['SORT_ORDER'] : 'DESC';
    $arParams['SHOW_MAP'] = (isset($arParams['SHOW_MAP']) && $arParams['SHOW_MAP'] === 'Y');

    if ($arParams['ELEMENT_LIMIT'] = ! (isset($arParams['ELEMENT_LIMIT']) && $arParams['ELEMENT_LIMIT'] === 'N')) {
        $arParams['ELEMENT_COUNT'] = (! empty($arParams['ELEMENT_COUNT'])) ? (int) $arParams['ELEMENT_COUNT'] : 2;
        $arParams['ELEMENT_COUNT'] = ($arParams['ELEMENT_COUNT'] > 0) ? $arParams['ELEMENT_COUNT'] : 2;
    }

    // Params for DB request
    $orderDB = [$arParams['SORT_BY'] => $arParams['SORT_ORDER']];
    $filterDB = [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ACTIVE' => 'Y',
    ];
    $navParamsDB = $arParams['ELEMENT_LIMIT'] ? ['nTopCount' => $arParams['ELEMENT_COUNT']] : false;
    $selectFieldsDB = [
        'IBLOCK_ID',
        'ID',
        'NAME',
        'PREVIEW_PICTURE',
        'DETAIL_PAGE_URL',
        'PROPERTY_WORK_HOURS',
        'PROPERTY_PHONE',
        'PROPERTY_ADDRESS',
    ];
    if ($arParams['SHOW_MAP']) {
        $selectFieldsDB[] = 'PROPERTY_MAP';
    }

    //Request to DB
    if ($requestDB = \CIBlockElement::GetList($orderDB, $filterDB, false, $navParamsDB, $selectFieldsDB)) {
        $responseDB = [];
        $imageFilter = [];
        while ($responseDB = $requestDB->GetNext()) {
            $arResult['ITEMS'][$responseDB['ID']] = $responseDB;

            $arResult['ITEMS'][$responseDB['ID']]['EDIT_LINK'] = '';
            $arResult['ITEMS'][$responseDB['ID']]['DELETE_LINK'] = '';

            if (isset($responseDB['PREVIEW_PICTURE'])) {
                $imageFilter[] = $responseDB['PREVIEW_PICTURE'];
            }

        }

        if (! empty($arResult['ITEMS'])) {

            // Matching elements with pictures by ID
            if (! empty($imageFilter)) {
                if ($requestFilesDB = \CFile::GetList([], ['MODULE_ID' => 'iblock', '@ID' => $imageFilter])) {
                    $imagesSRC = [];
                    while ($responseFilesDB = $requestFilesDB->GetNext()) {
                        $imagesSRC[$responseFilesDB['~ID']] = \CFile::GetFileSRC($responseFilesDB);
                    }
                }
            }

            foreach ($arResult['ITEMS'] as &$imgElement) {
                $imgElement['PREVIEW_PICTURE'] = $imagesSRC[$imgElement['PREVIEW_PICTURE']] ?? NO_IMAGE_PATH;
            }

            // Component elements bottons
            if ($buttons['show']) {
                foreach ($arResult['ITEMS'] as $id => &$bottItem) {
                    $elementButtons = \CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], $id, 0, $buttons['options']);
                    $bottItem['EDIT_LINK'] = $elementButtons['edit']['edit_element']['ACTION_URL'];
                    $bottItem['DELETE_LINK'] = $elementButtons['edit']['delete_element']['ACTION_URL'];
                }
            }

            // Map settings
            if ($arParams['SHOW_MAP']) {
                $settings = [];
                $lat = [];
                $lon = [];
                foreach ($arResult['ITEMS'] as $item) {
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

                $arResult['MAP_SETTINGS'] = serialize($settings);
            }
        }
    }

    $this->setResultCacheKeys(['MAP_SETTINGS']);
    $this->IncludeComponentTemplate();
}
