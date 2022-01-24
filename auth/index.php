<?php
define('NEED_AUTH', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<?php if ($_REQUEST['register'] === 'yes') :?>
    <?php $APPLICATION->SetTitle('Благодарим Вас за регистрацию в интернет-магазине «Рога и сила»!');?>
    <div>
        <p class="text-2xl text-grey-600 mb-4">Добро пожаловать!</p>
        <p>Пожалуйста, проверьте Ваш email – мы отправили Вам приветственное письмо. Теперь у Вас есть возможность:</p>
        <ul class="list-inside bullet-list-item mb-4">
            <li>Сохранять в Личном кабинете персональные данные</li>
            <li>Легко отслеживать статус Вашего заказа в режиме online</li>
            <li>В любой момент просмотреть историю Ваших заказов</li>
        </ul>
        <p>Что Вы хотите сделать прямо сейчас?</p>
    </div>
<?php elseif (false && isset($_REQUEST['backurl']) && $_REQUEST['backurl'] <> '' && preg_match('#^/#', $_REQUEST['backurl'])):?>
    <script>
        document.location.href = "<?=CUtil::JSEscape($_REQUEST['backurl'])?>";
    </script>
<?php else :?>
    <?php $APPLICATION->SetTitle('Авторизация');?>
    <div>
        <?php if ($_REQUEST['login'] === 'yes') :?>
            <p>Вы успешно авторизовались.</p>
        <?php else :?>
            <p>Вы уже авторизованы.</p>
        <?php endif?>
        <p><a class="text-gray-600 hover:text-orange font-bold" href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>
    </div>
<?php endif?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
