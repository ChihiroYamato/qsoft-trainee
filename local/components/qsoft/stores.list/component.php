<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

if (! \Bitrix\Main\Loader::includeModule('iblock')) {return;}

/**
* Bitrix vars
*
* @var array $arResult
* @var array $arParams
* @var CMain $APPLICATION
* @var CUser $USER
* @var CBitrixComponent $this
*/


global $CACHE_MANAGER;


// Initializing params
$arParams['DETAILS_URL'] = (! empty($arParams['DETAILS_URL'])) ? htmlspecialcharsbx(trim($arParams['DETAILS_URL'])) : '';
$arParams['MENU_CACHE_TYPE'] = (! empty($arParams['MENU_CACHE_TYPE'])) ? $arParams['MENU_CACHE_TYPE'] : 'A';
$arParams['SORT_BY'] = (! empty($arParams['SORT_BY'])) ? $arParams['SORT_BY'] : 'RAND';
$arParams['SORT_ORDER'] = (! empty($arParams['SORT_ORDER'])) ? $arParams['SORT_ORDER'] : 'DESC';
$arParams['IBLOCK_ID'] = (! empty($arParams['IBLOCK_ID'])) ? intval($arParams['IBLOCK_ID']) : 4;
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
        $arResponse['NAME'] = $responseDB['~NAME'];
        $arResponse['PREVIEW_PICTURE'] = CFile::GetFileArray($responseDB['~PREVIEW_PICTURE'])['SRC'];
        $arResponse['DETAIL_PAGE_URL'] = $responseDB['~DETAIL_PAGE_URL'];
        $arResponse['WORK_HOURS'] = $responseDB['~PROPERTY_WORK_HOURS_VALUE'];
        $arResponse['PHONE'] = $responseDB['~PROPERTY_PHONE_VALUE'];
        $arResponse['ADDRESS'] = $responseDB['~PROPERTY_ADDRESS_VALUE'];

        $arResult[] = $arResponse;
    }
}

$this->IncludeComponentTemplate();
