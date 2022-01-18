<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

define('NO_IMAGE_PATH', '/local/templates/.default/vendor/images/no_image.png');
define('SITE_TEMPLATE_DEFAULT', '/local/templates/.default');

\Bitrix\Main\EventManager::getInstance()->addEventHandler('main', 'OnAfterUserLogin', function ($arParams) {
    if ($arParams['USER_ID'] > 0) {
        echo '<pre>';
        var_dump($arParams);
        echo '</pre>';
        die;
    }
});
