<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/bitrix/header.php');
$APPLICATION->SetTitle('Карта сайта');

?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:main.map',
    '.default',
    [
    'CACHE_TYPE' => 'A',
    'CACHE_TIME' => '36000000',
    'SET_TITLE' => 'Y',
    'LEVEL' => '4',
    'COL_NUM' => '2',
    'SHOW_DESCRIPTION' => 'Y'
    ],
    false
);?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
