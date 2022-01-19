<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

if (! \Bitrix\Main\Loader::includeModule('iblock')) {return;}

$arIBlocksTypes = \CIBlockParameters::GetIBlockTypes();

$requestDB = \CIBlock::GetList(
    ['SORT' => 'ASC'],
    [
        'SITE_ID' => $_REQUEST['site'],
        'TYPE' => $arCurrentValues['IBLOCK_TYPE'],
    ]
);

$arIBlocks = [];
while ($responseDB = $requestDB->GetNext()) {
	$arIBlocks[$responseDB['~ID']] = "[{$responseDB['~ID']}] {$responseDB['~NAME']}";
}

$arComponentParameters = [
    'PARAMETERS' => [
        'IBLOCK_TYPE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('IBLOCK_TYPE_NAME'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlocksTypes,
            'DEFAULT' => 'salons',
            'ADDITIONAL_VALUES' => 'N',
            'REFRESH' => 'Y',
        ],
        'IBLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('IBLOCK_ID_NAME'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlocks,
            'DEFAULT' => '4',
            'ADDITIONAL_VALUES' => 'N',
        ],
        'ELEMENT_COUNT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('ELEMENT_COUNT_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => '2',
            'ADDITIONAL_VALUES' => 'Y',
        ],
        'SORT_BY' => [
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('SORT_BY_NAME'),
            'TYPE' => 'LIST',
            'DEFAULT' => 'RAND',
            'VALUES' => [
                'RAND' => GetMessage('DESC_RAND_NAME'),
                'ID' => GetMessage('DESC_ID_NAME'),
                'NAME' => GetMessage('DESC_NAME_NAME'),
                'ACTIVE_FROM' => GetMessage('DESC_ACT_NAME'),
                'TIMESTAMP_X' => GetMessage('DESC_TSAMP_NAME'),
            ],
            'ADDITIONAL_VALUES' => 'N',
        ],
        'SORT_ORDER' => [
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('SORT_ORDER_NAME'),
            'TYPE' => 'LIST',
            'DEFAULT' => 'DESC',
            'VALUES' => [
                'ASC' => GetMessage('IBLOCK_DESC_ASC'),
                'DESC' => GetMessage('IBLOCK_DESC_DESC')
            ],
            'ADDITIONAL_VALUES' => 'N',
        ],
        'DETAILS_URL' => [
            'PARENT' => 'ADDITIONAL_SETTINGS',
            'NAME' => GetMessage('DETAILS_URL_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => '/company/stores/',
        ],
        'CACHE_TIME' => [
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => GetMessage('COMP_PROP_CACHE_TIME'),
            'TYPE' => 'STRING',
            'DEFAULT' => '3600',
        ],
    ],
];
