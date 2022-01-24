<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Наши салоны');
?>

<?php $APPLICATION->IncludeComponent(
    'qsoft:stores.list',
    'stores_full',
    [
        'DETAILS_URL' => '/company/stores/',
        'ELEMENT_LIMIT' => 'N',
        'IBLOCK_ID' => '4',
        'IBLOCK_TYPE' => 'salons',
        'SORT_BY' => 'NAME',
        'SORT_ORDER' => 'DESC',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => '3600',
        'SHOW_MAP' => 'Y',
    ]
);?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
