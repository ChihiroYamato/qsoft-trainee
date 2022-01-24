<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:news.detail',
    'news_detail_inner',
    [
        'ACTIVE_DATE_FORMAT' => $arParams['DETAIL_ACTIVE_DATE_FORMAT'],                                                 // Формат показа даты
        'ADD_ELEMENT_CHAIN' => isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : '',             // Включать название элемента в цепочку навигации
        'ADD_SECTIONS_CHAIN' => $arParams['ADD_SECTIONS_CHAIN'],                                                        // Включать раздел в цепочку навигации
        'BROWSER_TITLE' => $arParams['BROWSER_TITLE'],                                                                  // Установить заголовок окна браузера из свойства
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],                                                                    // Учитывать права доступа
        'CACHE_TIME' => $arParams['CACHE_TIME'],                                                                        // Время кеширования (сек.)
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],                                                                        // Тип кеширования
        'CHECK_DATES' => $arParams['CHECK_DATES'],                                                                      // Показывать только активные на данный момент элементы
        'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['detail'],                                       // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        'DISPLAY_BOTTOM_PAGER' => $arParams['DETAIL_DISPLAY_BOTTOM_PAGER'],                                             // Выводить под списком
        'DISPLAY_TOP_PAGER' => $arParams['DETAIL_DISPLAY_TOP_PAGER'],                                                   // Выводить над списком
        'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],                                                       // Код новости
        'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],                                                           // ID новости
        'FIELD_CODE' => $arParams['DETAIL_FIELD_CODE'],                                                                 // Поля
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],                                                                          // Код информационного блока
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],                                                                      // Тип информационного блока (используется только для проверки)
        'IBLOCK_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['news'],                                         // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
        'INCLUDE_IBLOCK_INTO_CHAIN' => $arParams['INCLUDE_IBLOCK_INTO_CHAIN'],                                          // Включать инфоблок в цепочку навигации
        'MESSAGE_404' => $arParams['MESSAGE_404'],                                                                      // Сообщение для показа (по умолчанию из компонента)
        'META_DESCRIPTION' => $arParams['META_DESCRIPTION'],                                                            // Установить описание страницы из свойства
        'META_KEYWORDS' => $arParams['META_KEYWORDS'],                                                                  // Установить ключевые слова страницы из свойства
        'PAGER_SHOW_ALL' => $arParams['DETAIL_PAGER_SHOW_ALL'],                                                         // Показывать ссылку 'Все'
        'PAGER_TEMPLATE' => $arParams['DETAIL_PAGER_TEMPLATE'],                                                         // Шаблон постраничной навигации
        'PAGER_TITLE' => $arParams['DETAIL_PAGER_TITLE'],                                                               // Название категорий
        'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],                                                           // Свойства
        'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],                                                   // Устанавливать канонический URL
        'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],                                                          // Устанавливать в заголовках ответа время модификации страницы
        'SET_STATUS_404' => $arParams['SET_STATUS_404'],                                                                // Устанавливать статус 404
        'SET_TITLE' => $arParams['SET_TITLE'],                                                                          // Устанавливать заголовок страницы
        'SHOW_404' => $arParams['SHOW_404'],                                                                            // Показ специальной страницы
        'STRICT_SECTION_CHECK' => isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : '',    // Строгая проверка раздела для показа элемента
        'USE_PERMISSIONS' => $arParams['USE_PERMISSIONS'],                                                              // Использовать дополнительное ограничение доступа
    ],
    $component
);?>
