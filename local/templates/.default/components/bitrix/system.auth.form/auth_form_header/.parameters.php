<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

$arTemplateParameters = [
    'AUTHORIZE_URL' => [
        'NAME' => GetMessage('AUTHORIZE_URL'),
        'TYPE' => 'STRING',
    ],
    'PERSONAL_DATA' => [
        'NAME' => GetMessage('PERSONAL_DATA'),
        'TYPE' => 'STRING',
    ],
    'REDIRECT_URL' => [
        'NAME' => GetMessage('REDIRECT_URL'),
        'TYPE' => 'STRING',
    ],
];
