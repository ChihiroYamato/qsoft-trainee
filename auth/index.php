<?php
define('NEED_AUTH', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<?php if (isset($_REQUEST['backurl']) && $_REQUEST['backurl'] <> '' && preg_match('#^/#', $_REQUEST['backurl'])):?>
    <script>
        document.location.href = "<?=CUtil::JSEscape($_REQUEST['backurl'])?>";
    </script>
<?php else :?>
    <?php $APPLICATION->SetTitle('Авторизация');?>
    <div>
        <p>Вы зарегистрированы и успешно авторизовались.</p>
        <p><a class="text-gray-600 hover:text-orange font-bold" href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>
    </div>
<?php endif?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
