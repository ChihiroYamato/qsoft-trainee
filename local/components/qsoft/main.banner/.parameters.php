<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

if (! \Bitrix\Main\Loader::includeModule('advertising')) {return;}

$arTypeFields = [];
if ($response = \CAdvType::GetList($by, $order, ['ACTIVE' => 'Y'], $is_filtered, 'Y')) {
    while ($request = $response->GetNext())
    {
        $arTypeFields[$request['SID']] = "[{$request['SID']}] {$request['NAME']}";
    }
}

$arComponentParameters = [
    'PARAMETERS' => [
        'TYPE' => [
            'NAME' => GetMessage('PARAM_TYPE'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'DEFAULT' => '',
            'VALUES' => $arTypeFields,
            'ADDITIONAL_VALUES' => 'N'
        ],
        'NOINDEX' => [
            'NAME' => GetMessage('PARAM_NOINDEX'),
            'PARENT' => 'BASE',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N',
        ],
        'QUANTITY' => [
            'NAME' => GetMessage('PARAM_QUANTITY'),
            'PARENT' => 'BASE',
            'TYPE' => 'STRING',
            'DEFAULT' => '1'
        ],
        'CACHE_TIME' => ['DEFAULT'=>'3600'],
    ]
];
