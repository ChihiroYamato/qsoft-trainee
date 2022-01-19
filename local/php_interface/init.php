<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

define('NO_IMAGE_PATH', '/local/templates/.default/vendor/images/no_image.png');
define('SITE_TEMPLATE_DEFAULT', '/local/templates/.default');

\Bitrix\Main\EventManager::getInstance()->addEventHandler('main', 'OnAfterUserLogin', function ($arParams) {
    if ($arParams['USER_ID'] > 0 && $requestUser = CUser::GetByID($arParams['USER_ID'])) {
        $user = $requestUser->Fetch();
        $arSend = [
            'MESSAGE_ID' => '87',
            'LID' => 's1',
            'FIELDS' => [
                'EMAIL' => $user['EMAIL'],
                'LOGIN' => $user['LOGIN'],
                'DATE' => $user['LAST_LOGIN'],
            ],
        ];
        Bitrix\Main\Mail\Event::sendImmediate($arSend);
    }
});
