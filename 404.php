<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus('404 Not Found');
@define('ERROR_404','Y');
define('HIDE_SIDEBAR', true);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->SetTitle('404 ошибка: Страница не найдена');
$APPLICATION->SetPageProperty('NOT_SHOW_NAV_CHAIN', 'Y');
?>

<div class="bx-404-container">
    <p>К сожалению, такая страница не найдена.</p>
    <p>Данная страница была удалена с сайта, либо ее никогда не существовало. Вы можете вернуться на <a href="/"><b style="color: #ff7614">Главную страницу</b></a> или воспользоваться <a href="/search/"><b style="color: #ff7614">поиском</b></a>.</p>
    <p>Если Вы хотите что-то сообщить, напишите нам с помощью формы <a href="/company/contacts/"><b style="color: #ff7614">Обратная связь</b></a><p>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
