<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

$APPLICATION->SetTitle(GetMessage('TITLE'));
?>
<?php if (isset($arParams['~AUTH_RESULT']['MESSAGE'])) :?>
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <p><?=$arParams['~AUTH_RESULT']['MESSAGE']?></p>
        </div>
    </div>
<?php endif?>
<?php if (! empty($arResult['ERROR_MESSAGE'])) :?>
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <p><?=$arResult['ERROR_MESSAGE']?></p>
        </div>
    </div>
<?php endif?>
<form name="form_auth" action="<?=$arResult["AUTH_URL"]?>" target="_top" method="POST">
    <?php if (! empty($_REQUEST['backurl'])) :?>
        <input type="hidden" name="backurl" value="<?=$_REQUEST['backurl']?>" />
    <?php endif?>
    <?php foreach ($arResult['POST'] as $key => $value) :?>
        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
    <?php endforeach?>
    <input type="hidden" name="AUTH_FORM" value="Y" />
    <input type="hidden" name="TYPE" value="AUTH" />
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="fieldName" class="text-gray-700 font-bold"><?=GetMessage('AUTH_LOGIN')?></label>
                <input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" required minlength="2" placeholder="<?=GetMessage('PLACEHOLDER_LOGIN')?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="block">
                <label for="fieldPassword" class="text-gray-700 font-bold"><?=GetMessage('AUTH_PASSWORD')?></label>
                <input id="fieldPassword" type="password" name="USER_PASSWORD" maxlength="255" required minlength="3" autocomplete="off" placeholder="******" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <?php if ($arResult['STORE_PASSWORD'] == 'Y') :?>
                <div class="block">
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                                <span class="ml-2"><?=GetMessage('AUTH_REMEMBER_ME')?></span>
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif?>
            <div class="block">
                <button type="submit" name="Login" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    <?=GetMessage('AUTH_AUTHORIZE')?>
                </button>
                <?php if ($arParams["NOT_SHOW_LINKS"] != "Y") :?>
                    <a href="<?=$arResult['AUTH_FORGOT_PASSWORD_URL']?>" rel="nofollow" class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                        <?=GetMessage('AUTH_FORGOT_PASSWORD')?>
                    </a>
                <?php endif?>
                <?php if ($arParams['NOT_SHOW_LINKS'] != 'Y' && $arResult['NEW_USER_REGISTRATION'] == 'Y' && $arParams['AUTHORIZE_REGISTRATION'] != 'Y') :?>
                    <a href="<?=$arResult['AUTH_REGISTER_URL']?>" rel="nofollow" class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                        <?=GetMessage('AUTH_REGISTER')?>
                    </a>
                <?php endif?>
            </div>
        </div>
    </div>
</form>
