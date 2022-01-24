<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

define('NO_IMAGE_PATH', '/local/templates/.default/vendor/images/no_image.png');
define('SITE_TEMPLATE_DEFAULT', '/local/templates/.default');

use \Bitrix\Main\EventManager;
use \Bitrix\Main\Mail\Event;

EventManager::getInstance()->addEventHandler('main', 'OnAfterUserAuthorize', function ($arParams) {
    $arSend = [
        'EVENT_NAME' => 'USER_LOGIN',
        'LID' => SITE_ID,
        'FIELDS' => [
            'EMAIL' => $arParams['user_fields']['EMAIL'],
            'LOGIN' => $arParams['user_fields']['LOGIN'],
            'DATE' => date('Y.m.d H:i:s'),
        ],
    ];
    Event::sendImmediate($arSend);
});

EventManager::getInstance()->addEventHandler('main', 'OnAfterUserRegister', function ($arParams) {
    if ($arParams['USER_ID']) {
        $arSend = [
            'EVENT_NAME' => 'NEW_USER',
            'LID' => SITE_ID,
            'FIELDS' => [
                'NAME' => $arParams['NAME'],
                'LAST_NAME' => $arParams['LAST_NAME'],
                'LOGIN' => $arParams['LOGIN'],
                'EMAIL' => $arParams['EMAIL'],
            ],
        ];
        Event::sendImmediate($arSend);
    }
});
