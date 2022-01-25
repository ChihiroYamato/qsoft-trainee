<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/bitrix/header.php');
$APPLICATION->SetTitle('Результат оплаты');
?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:sale.order.payment.receive',
    '',
    [
        'PAY_SYSTEM_ID' => '',
        'PERSON_TYPE_ID' => ''
    ],
    false
);?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
