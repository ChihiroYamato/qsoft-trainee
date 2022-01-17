<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use Bitrix\Main\Loader;

// Initializing params before cache
$arParams['IBLOCK_ID'] = (! empty($arParams['IBLOCK_ID'])) ? intval($arParams['IBLOCK_ID']) : 4;
$arParams['CACHE_TIME'] = (! empty($arParams['CACHE_TIME'])) ? intval($arParams['CACHE_TIME']) : 3600;
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
    $arParams['ELEMENT_COUNT'] = (! empty($arParams['ELEMENT_COUNT'])) ? intval($arParams['ELEMENT_COUNT']) : 2;
    $arParams['ELEMENT_COUNT'] = ($arParams['ELEMENT_COUNT'] > 0) ? $arParams['ELEMENT_COUNT'] : 2;

    // Params for DB request
    $orderDB = [$arParams['SORT_BY'] => $arParams['SORT_ORDER']];
    $filterDB = [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ACTIVE' => 'Y',
    ];
    $navParamsDB = ['nTopCount' => $arParams['ELEMENT_COUNT']];
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

            foreach ($arResult['ITEMS'] as &$item) {
                $item['PREVIEW_PICTURE'] = $imagesSRC[$item['PREVIEW_PICTURE']] ?? NO_IMAGE_PATH;
            }

            // Component elements bottons
            if ($buttons['show']) {
                foreach ($arResult['ITEMS'] as $id => &$item) {
                    $elementButtons = \CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], $id, 0, $buttons['options']);
                    $item['EDIT_LINK'] = $elementButtons['edit']['edit_element']['ACTION_URL'];
                    $item['DELETE_LINK'] = $elementButtons['edit']['delete_element']['ACTION_URL'];
                }
            }
        }

    }

    $this->setResultCacheKeys([]);
    $this->IncludeComponentTemplate();
}
