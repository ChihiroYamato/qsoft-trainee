<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:news',
    'news_qsoft',
    [
        'ADD_ELEMENT_CHAIN' => 'Y',                     // Включать название элемента в цепочку навигации
        'ADD_SECTIONS_CHAIN' => 'Y',                    // Включать раздел в цепочку навигации
        'AJAX_MODE' => 'N',                             // Включить режим AJAX
        'AJAX_OPTION_ADDITIONAL' => '',                 // Дополнительный идентификатор
        'AJAX_OPTION_HISTORY' => 'Y',                   // Включить эмуляцию навигации браузера
        'AJAX_OPTION_JUMP' => 'Y',                      // Включить прокрутку к началу компонента
        'AJAX_OPTION_STYLE' => 'Y',                     // Включить подгрузку стилей
        'BROWSER_TITLE' => '-',                         // Установить заголовок окна браузера из свойства
        'CACHE_FILTER' => 'Y',                          // Кешировать при установленном фильтре
        'CACHE_GROUPS' => 'Y',                          // Учитывать права доступа
        'CACHE_TIME' => '3600',                         // Время кеширования (сек.)
        'CACHE_TYPE' => 'A',                            // Тип кеширования
        'CHECK_DATES' => 'Y',                           // Показывать только активные на данный момент элементы
        'DETAIL_ACTIVE_DATE_FORMAT' => 'j F Y',         // Формат показа даты
        'DETAIL_DISPLAY_BOTTOM_PAGER' => 'Y',           // Выводить под списком
        'DETAIL_DISPLAY_TOP_PAGER' => 'N',              // Выводить над списком
        'DETAIL_FIELD_CODE' => [                        // Поля
            0 => 'TAGS',
            1 => '',
        ],
        'DETAIL_PAGER_SHOW_ALL' => 'Y',                 // Показывать ссылку 'Все'
        'DETAIL_PAGER_TEMPLATE' => 'news_detail_inner', // Название шаблона
        'DETAIL_PAGER_TITLE' => 'Страница',             // Название категорий
        'DETAIL_PROPERTY_CODE' => [                     // Свойства
            0 => '',
            1 => '',
        ],
        'DETAIL_SET_CANONICAL_URL' => 'N',              // Устанавливать канонический URL
        'DISPLAY_BOTTOM_PAGER' => 'Y',                  // Выводить под списком
        'DISPLAY_TOP_PAGER' => 'N',                     // Выводить над списком
        'FILE_404' => '',
        'HIDE_LINK_WHEN_NO_DETAIL' => 'Y',              // Скрывать ссылку, если нет детального описания
        'IBLOCK_ID' => '5',                             // Инфоблок
        'IBLOCK_TYPE' => 'news',                        // Тип инфоблока
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',             // Включать инфоблок в цепочку навигации
        'LIST_ACTIVE_DATE_FORMAT' => 'j M Y',           // Формат показа даты
        'LIST_FIELD_CODE' => [                          // Поля
            0 => 'TAGS',
            1 => '',
        ],
        'LIST_PROPERTY_CODE' => [                       // Свойства
            0 => '',
            1 => '',
        ],
        'MESSAGE_404' => '',                            // Сообщение для показа (по умолчанию из компонента)
        'META_DESCRIPTION' => '-',                      // Установить описание страницы из свойства
        'META_KEYWORDS' => '-',                         // Установить ключевые слова страницы из свойства
        'NEWS_COUNT' => '10',                           // Количество новостей на странице
        'PAGER_BASE_LINK_ENABLE' => 'N',                // Включить обработку ссылок
        'PAGER_DESC_NUMBERING' => 'N',                  // Использовать обратную навигацию
        'PAGER_DESC_NUMBERING_CACHE_TIME' => '3600',    // Время кеширования страниц для обратной навигации
        'PAGER_SHOW_ALL' => 'Y',                        // Показывать ссылку 'Все'
        'PAGER_SHOW_ALWAYS' => 'N',                     // Выводить всегда
        'PAGER_TEMPLATE' => 'qsoft_pagenavigation',     // Шаблон постраничной навигации
        'PAGER_TITLE' => 'Новости',                     // Название категорий
        'PREVIEW_TRUNCATE_LEN' => '150',                // Максимальная длина анонса для вывода (только для типа текст)
        'SEF_FOLDER' => '/company/news/',               // Каталог ЧПУ (относительно корня сайта)
        'SEF_MODE' => 'Y',                              // Включить поддержку ЧПУ
        'SET_LAST_MODIFIED' => 'N',                     // Устанавливать в заголовках ответа время модификации страницы
        'SET_STATUS_404' => 'Y',                        // Устанавливать статус 404
        'SET_TITLE' => 'Y',                             // Устанавливать заголовок страницы
        'SHOW_404' => 'N',                              // Показ специальной страницы
        'SORT_BY1' => 'ACTIVE_FROM',                    // Поле для первой сортировки новостей
        'SORT_BY2' => 'SORT',                           // Поле для второй сортировки новостей
        'SORT_ORDER1' => 'DESC',                        // Направление для первой сортировки новостей
        'SORT_ORDER2' => 'ASC',                         // Направление для второй сортировки новостей
        'STRICT_SECTION_CHECK' => 'N',                  // Строгая проверка раздела
        'USE_CATEGORIES' => 'N',                        // Выводить материалы по теме
        'USE_FILTER' => 'N',                            // Показывать фильтр
        'USE_PERMISSIONS' => 'N',                       // Использовать дополнительное ограничение доступа
        'USE_RATING' => 'N',                            // Разрешить голосование
        'USE_REVIEW' => 'N',                            // Разрешить отзывы
        'USE_RSS' => 'N',                               // Разрешить RSS
        'USE_SEARCH' => 'N',                            // Разрешить поиск
        'USE_SHARE' => 'N',                             // Отображать панель соц. закладок
        'COMPONENT_TEMPLATE' => 'news_qsoft',
        'SEF_URL_TEMPLATES' => [
            'news' => '',
            'section' => '',
            'detail' => '#ELEMENT_CODE#/',
        ]
    ],
);?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
