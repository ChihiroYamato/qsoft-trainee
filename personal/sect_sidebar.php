<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>

<div class="bx-sidebar-block">
    <?php $APPLICATION->IncludeComponent(
        'bitrix:menu',
        'personal_menu',
            [
            'ROOT_MENU_TYPE' => 'personal',
            'MAX_LEVEL' => '1',
            'MENU_CACHE_TYPE' => 'A',
            'CACHE_SELECTED_ITEMS' => 'N',
            'MENU_CACHE_TIME' => '36000000',
            'MENU_CACHE_USE_GROUPS' => 'Y',
            'MENU_CACHE_GET_VARS' => [],
            ],
        false
    );?>
</div>
<div class="bx-sidebar-block">
    <?php $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => SITE_DIR.'include/socnet_sidebar.php',
            'AREA_FILE_RECURSIVE' => 'N',
            'EDIT_MODE' => 'html',
        ],
        false,
        ['HIDE_ICONS' => 'Y']
    );?>
</div>

<div class="bx-sidebar-block hidden-xs">
    <?php $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => SITE_DIR.'include/sender.php',
            'AREA_FILE_RECURSIVE' => 'N',
            'EDIT_MODE' => 'html',
        ],
        false,
        ['HIDE_ICONS' => 'Y']
    );?>
</div>

<div class="bx-sidebar-block">
    <?php $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => SITE_DIR.'include/about.php',
            'AREA_FILE_RECURSIVE' => 'N',
            'EDIT_MODE' => 'html',
        ],
        false,
        ['HIDE_ICONS' => 'N']
    );?>
</div>
