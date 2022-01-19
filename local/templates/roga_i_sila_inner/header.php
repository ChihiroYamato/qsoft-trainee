<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_DEFAULT . '/vendor/css/form.css');
$asset->addCss(SITE_TEMPLATE_DEFAULT . '/vendor/css/tailwind.css');
$asset->addCss(SITE_TEMPLATE_DEFAULT . '/vendor/css/base.css');

$asset->addJs(SITE_TEMPLATE_DEFAULT . '/vendor/js/jquery-3.6.0.js');

$asset->addCss(SITE_TEMPLATE_DEFAULT . '/vendor/css/slick.css');
$asset->addJs(SITE_TEMPLATE_DEFAULT . '/vendor/js/slick.js');

$asset->addJs(SITE_TEMPLATE_DEFAULT . '/vendor/js/script.js');
?>
<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <title><?php $APPLICATION->ShowTitle(false)?></title>
    <?php $APPLICATION->ShowHead()?>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<?php $APPLICATION->ShowPanel()?>
<div class="wrapper flex flex-1 flex-col">
    <header class="bg-white">
        <div class="border-b">
            <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
                <div class="flex justify-center">
                    <span class="inline-block sm:inline">
                        <img src="<?=SITE_TEMPLATE_DEFAULT?>/vendor/images/logo.png" width="222" height="30" alt="">
                    </span>
                </div>
                <div>
                    <?php $APPLICATION->IncludeComponent(
                        'bitrix:system.auth.form',
                        'auth_form_header',
                        [
                            'FORGOT_PASSWORD_URL' => '/auth/',              // Страница забытого пароля
                            'PROFILE_URL' => '/personal/',                  // Страница профиля
                            'REGISTER_URL' => '/auth/',                     // Страница регистрации
                            'SHOW_ERRORS' => 'N',                           // Показывать ошибки
                            'COMPONENT_TEMPLATE' => 'auth_form_header',     // Шаблон компонента
                            'AUTHORIZE_URL' => '/auth/',                    // (Пользовательское) Страница авторизации
                            'PERSONAL_DATA' => '/personal/profile/',        // (Пользовательское) Страница персональных данных
                            'REDIRECT_URL' => '/',                          // (Пользовательское) страница перенаправления после выхода
                        ],
                    );?>
                </div>
            </div>
        </div>
        <div class="border-b">
            <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
                <form name="search_form" class="bg-gray-100 rounded-full flex items-center px-3 text-sm order-2 my-4 lg:my-0">
                    <label for="search-input" class="hidden"></label>
                    <input id="search-input" type="text" placeholder="Поиск по сайту" class="bg-gray-100 rounded-full py-1 px-1 focus:outline-none placeholder-opacity-50 flex-1 border-none focus:shadow-none focus:ring-0">
                    <button type="submit" class="group focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black group-hover:text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>

                <?php $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'catalog_top',
                    [
                        'ROOT_MENU_TYPE' => 'top',          // Тип меню для первого уровня
                        'CHILD_MENU_TYPE' => 'left',        // Тип меню для остальных уровней
                        'DELAY' => 'N',                     // Откладывать выполнение шаблона меню
                        'MAX_LEVEL' => '2',                 // Уровень вложенности меню
                        'MENU_CACHE_GET_VARS' => [          // Значимые переменные запроса
                            0 => '',
                        ],
                        'MENU_CACHE_TIME' => '3600',        // Время кеширования (сек.)
                        'MENU_CACHE_TYPE' => 'A',           // Тип кеширования
                        'MENU_CACHE_USE_GROUPS' => 'Y',     // Учитывать права доступа
                        'USE_EXT' => 'Y',                   // Подключать файлы с именами вида .тип_меню.menu_ext.php
                        'ALLOW_MULTI_SELECT' => 'N',        // Разрешить несколько активных пунктов одновременно
                    ],
                );?>
            </div>
        </div>
    </header>

    <?php $APPLICATION->IncludeComponent(
        'bitrix:breadcrumb',
        'breadcrumbs_qsoft',
        [
            'PATH' => '',           // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            'SITE_ID' => 's1',      // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
            'START_FROM' => '0',    // Номер пункта, начиная с которого будет построена навигационная цепочка
        ],
    );?>

    <main class="flex-1 container mx-auto bg-white flex">
        <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <aside class="hidden sm:block col-span-1 border-r p-4">
                <nav>
                    <ul class="text-sm">
                        <li>
                            <p class="text-xl text-black font-bold mb-4"><?=Loc::getMessage('BOTTOM_MENU_HEADER')?></p>
                            <?php $APPLICATION->IncludeComponent(
                                'bitrix:menu',
                                'menu_left',
                                [
                                    'ALLOW_MULTI_SELECT' => 'N',	// Разрешить несколько активных пунктов одновременно
                                    'CHILD_MENU_TYPE' => 'left',	// Тип меню для остальных уровней
                                    'DELAY' => 'N',	                // Откладывать выполнение шаблона меню
                                    'MAX_LEVEL' => '1',	            // Уровень вложенности меню
                                    'MENU_CACHE_GET_VARS' => [	    // Значимые переменные запроса
                                        0 => '',
                                    ],
                                    'MENU_CACHE_TIME' => '3600',	// Время кеширования (сек.)
                                    'MENU_CACHE_TYPE' => 'A',	    // Тип кеширования
                                    'MENU_CACHE_USE_GROUPS' => 'Y',	// Учитывать права доступа
                                    'ROOT_MENU_TYPE' => 'bottom',	// Тип меню для первого уровня
                                    'USE_EXT' => 'N',	            // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                ],
                            );?>
                        </li>
                    </ul>
                </nav>
            </aside>
            <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
                <h1 class="text-black text-3xl font-bold mb-4"><?php $APPLICATION->ShowTitle()?></h1>
