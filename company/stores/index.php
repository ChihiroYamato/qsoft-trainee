<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Наши салоны');
?>

<?php $APPLICATION->IncludeComponent(
    'qsoft:stores.list',
    'stores_full',
    [
        'DETAILS_URL' => '/company/stores/',    // URL-адрес ссылки на все элементы
        'ELEMENT_LIMIT' => 'N',                 // Ограничить выборку элементов
        'IBLOCK_ID' => '4',                     // Название Инфоблока (ID)
        'IBLOCK_TYPE' => 'salons',              // Тип инфоблока
        'SORT_BY' => 'NAME',                    // Поле сортировки
        'SORT_ORDER' => 'DESC',                 // Порядок сортировки
        'CACHE_TYPE' => 'A',                    // Тип кеширования
        'CACHE_TIME' => '3600',                 // Время кеширования (сек.)
        'SHOW_MAP' => 'Y',                      // Показывать карту
    ]
);?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
