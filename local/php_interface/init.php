<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

define('NO_IMAGE_PATH', '/images/no_car_image.png');
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
