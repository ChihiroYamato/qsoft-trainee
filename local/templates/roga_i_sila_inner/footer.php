<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>
            </div>
        </div>
    </main>
    <footer class="container mx-auto">
        <section class="block sm:flex bg-white px-4 sm:px-8 py-4">
            <?php $APPLICATION->IncludeComponent(
                'qsoft:stores.list',
                'stores_short',
                [
                    'DETAILS_URL' => '/company/stores/',
                    'ELEMENT_COUNT' => '2',
                    'IBLOCK_ID' => '4',
                    'IBLOCK_TYPE' => 'salons',
                    'SORT_BY' => 'RAND',
                    'SORT_ORDER' => 'DESC',
                    'CACHE_TYPE' => 'A',
                    'CACHE_TIME' => '3600',
                ]
            );?>
            <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
                <p class="text-3xl text-black font-bold mb-4"><?=Loc::getMessage('BOTTOM_MENU_FOOTER')?></p>
                <nav>
                <?php $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'menu_footer',
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
                </nav>
            </div>
        </section>


        <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
            <div class="copy pr-8">© 2021 Рога &amp; Сила. Продажа автомобилей.</div>
            <div class="text-right">
                <a href="https://www.qsoft.ru" target="_blank" class="inline-block">Сделано в <img class="ml-2 inline-block" src="<?=SITE_TEMPLATE_DEFAULT?>/vendor/images/qsoft.png" width="59" height="11" alt=""/></a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
