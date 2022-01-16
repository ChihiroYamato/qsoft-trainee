<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use Bitrix\Main\Loader;

// Initializing params before cache
$arParams['IBLOCK_ID'] = (! empty($arParams['IBLOCK_ID'])) ? intval($arParams['IBLOCK_ID']) : 4;
$arParams['CACHE_TIME'] = (! empty($arParams['CACHE_TIME'])) ? intval($arParams['CACHE_TIME']) : 3600;
$arParams['CACHE_TIME'] = ($arParams['CACHE_TIME'] > 0) ? $arParams['CACHE_TIME'] : 3600;

// Component bottons
$buttobOptions = ['SECTION_BUTTONS' => false, 'SESSID' => false];
if ($APPLICATION->GetShowIncludeAreas()) {
    if (Loader::includeModule('iblock')) {
        $componentButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, 0, $buttobOptions);
        $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $componentButtons));
    }
}

$userGroups = $USER->GetGroups();

if ($this->startResultCache(false, $userGroups)) {
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
    if ($requestDB = CIBlockElement::GetList($orderDB, $filterDB, false, $navParamsDB, $selectFieldsDB)) {
        while ($responseDB = $requestDB->GetNext()) {
            $arResponse = [];
            $arResponse['ID'] = $responseDB['~ID'];
            $arResponse['NAME'] = $responseDB['~NAME'];
            $arResponse['PREVIEW_PICTURE'] = CFile::GetFileArray($responseDB['~PREVIEW_PICTURE'])['SRC'];
            $arResponse['DETAIL_PAGE_URL'] = $responseDB['~DETAIL_PAGE_URL'];
            $arResponse['WORK_HOURS'] = $responseDB['~PROPERTY_WORK_HOURS_VALUE'];
            $arResponse['PHONE'] = $responseDB['~PROPERTY_PHONE_VALUE'];
            $arResponse['ADDRESS'] = $responseDB['~PROPERTY_ADDRESS_VALUE'];

            $arResponse['EDIT_LINK'] = '';
            $arResponse['DELETE_LINK'] = '';

            $arResult['ITEMS'][$arResponse['ID']] = $arResponse;
        }

        // Component elements bottons
        if (! empty($arResult['ITEMS']) && ($USER->isAdmin() || preg_match('~7|8~', $userGroups))) {
            foreach ($arResult['ITEMS'] as $id => &$item) {
                $elementButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], $id, 0, $buttobOptions);
                $item['EDIT_LINK'] = $elementButtons['edit']['edit_element']['ACTION_URL'];
                $item['DELETE_LINK'] = $elementButtons['edit']['delete_element']['ACTION_URL'];
            }
        }

    } else {
        $this->abortResultCache();
    }
    $this->setResultCacheKeys([]);
    $this->IncludeComponentTemplate();
}
