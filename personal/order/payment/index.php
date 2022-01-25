<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/bitrix/header.php');
$APPLICATION->SetTitle('Оплата заказа');
?>
<?php $APPLICATION->IncludeComponent(
   'bitrix:sale.order.payment',
   '',
   []
);?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
