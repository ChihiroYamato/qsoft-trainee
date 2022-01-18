<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    'bitrix:menu.sections',
    '',
    [
        'CACHE_TIME' => '3600',
        'CACHE_TYPE' => 'A',
        'DEPTH_LEVEL' => '2',
        'IBLOCK_ID' => '6',
        'ID' => '',
        'IBLOCK_TYPE' => 'products',
        'IS_SEF' => 'N',
        'SECTION_URL' => '/catalog/#SECTION_CODE#/',
    ]
);

array_walk($aMenuLinksExt, function (&$menu) use ($aMenuLinks) {
    foreach ($aMenuLinks as $item) {
        if ($menu[3]['IS_PARENT'] && $menu[0] === $item[0] && $menu[1] === $item[1]) {
            $menu[2] = array_merge($item[2], $menu[2]);
            $menu[3] = array_merge($item[3], $menu[3]);
            $menu[4] = $item[4];
            return;
        }
    }
});
$aMenuLinks = $aMenuLinksExt;
