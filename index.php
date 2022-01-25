<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/bitrix/header.php');

$APPLICATION->SetTitle('Рога и Сила — главная страница');
?>
        <?php $APPLICATION->IncludeComponent(
            'qsoft:main.banner',
            '',
            [
                'CACHE_TIME' => '3600',             // Время кеширования
                'CACHE_TYPE' => 'A',                // Тип кеширования
                'NOINDEX' => 'N',                   // Добавлять в ссылки noindex/nofollow
                'QUANTITY' => '3',                  // Количество баннеров для показа
                'TYPE' => 'QSOFT',                  // Тип баннера
                'COMPONENT_TEMPLATE' => '.default'  // Шаблон компонента
            ],
        );?>
        <section class="pb-4 px-6">
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/images/car_cerato.png" alt="Cerato"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Cerato</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">1 221 900 ₽</span><span class="inline-block line-through pl-6 text-gray-400">1 821 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/images/car_rio-x.png" alt="Rio X"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Rio X</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">969 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/images/car_mohave_new.png" alt="Mohave"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Mohave</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">3 549 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/images/car_K5-half.png" alt="K5"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">K5</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">1 577 900 ₽</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php $APPLICATION->IncludeComponent(
            'bitrix:news.list',
            'news_list_main',
            [
                'ACTIVE_DATE_FORMAT' => 'j M Y',                    // Формат показа даты
                'ADD_SECTIONS_CHAIN' => 'N',                        // Включать раздел в цепочку навигации
                'AJAX_MODE' => 'N',                                 // Включить режим AJAX
                'AJAX_OPTION_ADDITIONAL' => '',                     // Дополнительный идентификатор
                'AJAX_OPTION_HISTORY' => 'N',                       // Включить эмуляцию навигации браузера
                'AJAX_OPTION_JUMP' => 'N',                          // Включить прокрутку к началу компонента
                'AJAX_OPTION_STYLE' => 'N',                         // Включить подгрузку стилей
                'CACHE_FILTER' => 'N',                              // Кешировать при установленном фильтре
                'CACHE_GROUPS' => 'Y',                              // Учитывать права доступа
                'CACHE_TIME' => '3600',                             // Время кеширования (сек.)
                'CACHE_TYPE' => 'A',                                // Тип кеширования
                'CHECK_DATES' => 'Y',                               // Показывать только активные на данный момент элементы
                'DETAIL_URL' => '/company/news/#ELEMENT_CODE#/',    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                'DISPLAY_BOTTOM_PAGER' => 'Y',                      // Выводить под списком
                'DISPLAY_DATE' => 'Y',                              // Выводить дату элемента
                'DISPLAY_NAME' => 'Y',                              // Выводить название элемента
                'DISPLAY_PICTURE' => 'Y',                           // Выводить изображение для анонса
                'DISPLAY_PREVIEW_TEXT' => 'Y',                      // Выводить текст анонса
                'DISPLAY_TOP_PAGER' => 'N',                         // Выводить над списком
                'FIELD_CODE' => [                                   // Поля
                    0 => 'TAGS',
                    1 => '',
                ],
                'FILTER_NAME' => '',                                // Фильтр
                'HIDE_LINK_WHEN_NO_DETAIL' => 'N',                  // Скрывать ссылку, если нет детального описания
                'IBLOCK_ID' => '5',                                 // Код информационного блока
                'IBLOCK_TYPE' => 'news',                            // Тип информационного блока (используется только для проверки)
                'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',                 // Включать инфоблок в цепочку навигации
                'INCLUDE_SUBSECTIONS' => 'Y',                       // Показывать элементы подразделов раздела
                'MESSAGE_404' => '',                                // Сообщение для показа (по умолчанию из компонента)
                'NEWS_COUNT' => '3',                                // Количество новостей на странице
                'PAGER_BASE_LINK_ENABLE' => 'N',                    // Включить обработку ссылок
                'PAGER_DESC_NUMBERING' => 'N',                      // Использовать обратную навигацию
                'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',       // Время кеширования страниц для обратной навигации
                'PAGER_SHOW_ALL' => 'N',                            // Показывать ссылку 'Все'
                'PAGER_SHOW_ALWAYS' => 'N',                         // Выводить всегда
                'PAGER_TEMPLATE' => '.default',                     // Шаблон постраничной навигации
                'PAGER_TITLE' => 'Новости',                         // Название категорий
                'PARENT_SECTION' => '',                             // ID раздела
                'PARENT_SECTION_CODE' => '',                        // Код раздела
                'PREVIEW_TRUNCATE_LEN' => '150',                       // Максимальная длина анонса для вывода (только для типа текст)
                'PROPERTY_CODE' => [                                // Свойства
                    0 => '',
                    1 => '',
                ],
                'SET_BROWSER_TITLE' => 'N',                         // Устанавливать заголовок окна браузера
                'SET_LAST_MODIFIED' => 'N',                         // Устанавливать в заголовках ответа время модификации страницы
                'SET_META_DESCRIPTION' => 'N',                      // Устанавливать описание страницы
                'SET_META_KEYWORDS' => 'N',                         // Устанавливать ключевые слова страницы
                'SET_STATUS_404' => 'N',                            // Устанавливать статус 404
                'SET_TITLE' => 'N',                                 // Устанавливать заголовок страницы
                'SHOW_404' => 'N',                                  // Показ специальной страницы
                'SORT_BY1' => 'ACTIVE_FROM',                        // Поле для первой сортировки новостей
                'SORT_BY2' => 'SORT',                               // Поле для второй сортировки новостей
                'SORT_ORDER1' => 'DESC',                            // Направление для первой сортировки новостей
                'SORT_ORDER2' => 'ASC',                             // Направление для второй сортировки новостей
                'STRICT_SECTION_CHECK' => 'N',                      // Строгая проверка раздела для показа списка
                'COMPONENT_TEMPLATE' => '.default',
            ],
        );?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
