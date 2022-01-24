<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

$APPLICATION->SetTitle(GetMessage('TITLE'));
?>
<?php if (isset($arParams['~AUTH_RESULT']['MESSAGE'])) :?>
    <?php foreach (explode('-----', trim(str_replace(['<br>', '<br />'], '-----', $arParams['~AUTH_RESULT']['MESSAGE']), '-----')) as $message) :?>
        <div class="my-4">
            <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                <p><?=$message?></p>
            </div>
        </div>
    <?php endforeach?>
<?php endif?>

<form action="<?=$arResult['AUTH_URL']?>" name="bform" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="AUTH_FORM" value="Y" />
    <input type="hidden" name="TYPE" value="REGISTRATION" />
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="fieldName" class="text-gray-700 font-bold"><?=GetMessage('AUTH_NAME')?></label>
                <input id="fieldName" type="text" name="USER_NAME" maxlength="255" value="<?=$arResult["USER_NAME"]?>" placeholder="<?=GetMessage('PLACEHOLDER_NAME')?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="block">
                <label for="fieldLstName" class="text-gray-700 font-bold"><?=GetMessage('AUTH_LAST_NAME')?></label>
                <input id="fieldLstName" type="text" name="USER_LAST_NAME" maxlength="255" value="<?=$arResult['USER_LAST_NAME']?>" placeholder="<?=GetMessage('PLACEHOLDER_LAST_NAME')?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="block">
                <label for="fieldLogin" class="text-gray-700 font-bold"><span class="text-red-500 font-bold">*</span><?=GetMessage('AUTH_LOGIN')?></label>
                <input id="fieldLogin" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult['USER_LOGIN']?>" placeholder="<?=GetMessage('PLACEHOLDER_LOGIN')?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
            </div>
            <div class="block">
                <label for="fieldPassword" class="text-gray-700 font-bold"><span class="text-red-500 font-bold">*</span><?=GetMessage('AUTH_PASSWORD')?></label>
                <input id="fieldPassword" type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult['USER_PASSWORD']?>" placeholder="******" autocomplete="off" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
            </div>
            <div class="block">
                <label for="fieldPasswordConfirmation" class="text-gray-700 font-bold"><span class="text-red-500 font-bold">*</span><?=GetMessage('AUTH_CONFIRM')?></label>
                <input id="fieldPasswordConfirmation" type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" placeholder="******" autocomplete="off" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
            </div>
            <?php if ($arResult['EMAIL_REGISTRATION']) :?>
                <div class="block">
                    <label for="fieldEmail" class="text-gray-700 font-bold"><?php if ($arResult['EMAIL_REQUIRED']) :?><span class="text-red-500 font-bold">*</span><?php endif?><?=GetMessage('AUTH_EMAIL')?></label>
                    <input id="fieldEmail" name="USER_EMAIL" type="email" placeholder="<?=GetMessage('PLACEHOLDER_EMAIL')?>" value="<?=$arResult['USER_EMAIL']?>" maxlength="255" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" <?=($arResult['EMAIL_REQUIRED']) ? 'required' : ''?> />
                </div>
            <?php endif?>
            <?php if ($arResult['PHONE_REGISTRATION']) :?>
                <div class="block">
                    <label for="fieldPhone" class="text-gray-700 font-bold"><?php if ($arResult['PHONE_REQUIRED']) :?><span class="text-red-500 font-bold">*</span><?php endif?><?=GetMessage('AUTH_PHONE')?></label>
                    <input id="fieldPhone" name="USER_PHONE_NUMBER" type="tel" placeholder="+7(914)-999-55-44" value="<?=$arResult['USER_PHONE_NUMBER']?>" pattern="\+?[0-9]\(?[0-9]{3}\)?-?[0-9]{3}-?[0-9]{2}-?[0-9]{2}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" <?=($arResult['PHONE_REQUIRED']) ? 'required' : ''?> />
                </div>
            <?php endif?>
            <?php if ($arResult['USE_CAPTCHA'] == 'Y') :?>
                <div class="block">
                    <input type="hidden" name="captcha_sid" value="<?=$arResult['CAPTCHA_CODE']?>" />
                    <label for="fieldPhone" class="text-gray-700 font-bold"><span class="text-red-500 font-bold">*</span><?=GetMessage('CAPTCHA_REGF_PROMT')?></label>
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA_CODE']?>" width="180" height="40" alt="CAPTCHA" />
                    <input id="fieldCaptcha" type="text" name="captcha_word" maxlength="50" autocomplete="off" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required />
                </div>
            <?php endif?>
            <div class="block">
                <div class="mt-2">
                    <div>
                        <label for="checkbox" class="text-gray-700 font-bold"><?=GetMessage('AUTH_AGREEMENT')?></label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="USER_AGREEMENT" name="USER_AGREEMENT" value="Y" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" required />
                            <span class="ml-2 italic"><?=GetMessage('AUTH_AGREEMENT_FULL')?></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="block">
                <button type="submit" name="Register" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    <?=GetMessage('AUTH_REGISTER')?>
                </button>
                <a href="<?=$arResult['AUTH_AUTH_URL']?>" rel="nofollow" class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                    <?=GetMessage('AUTH_AUTH')?>
                </a>
            </div>
            <hr class="bxe-light">
            <div class="block">
                <p class="italic"><?=$arResult['GROUP_POLICY']['PASSWORD_REQUIREMENTS']?></p>
                <p class="text-gray-700 font-bold"><span class="text-red-500">*</span> - <?=GetMessage('AUTH_REQ')?></p>
            </div>
        </div>
    </div>
</form>
