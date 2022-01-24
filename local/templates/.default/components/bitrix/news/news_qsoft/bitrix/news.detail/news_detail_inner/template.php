<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php if (! empty ($arResult)) :?>
    <div class="space-y-4">
        <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" title="">
        <span class="inline-flex items-center font-bold text-orange"><?=$arResult['DISPLAY_ACTIVE_FROM']?></span>
        <?php if (! empty($arResult['TAGS'])) :?>
            <div>
                <?php foreach (explode(',', $arResult['TAGS']) as $tag) :?>
                    <span class="text-sm text-white italic rounded bg-orange px-2"><?=$tag?></span>
                <?php endforeach?>
            </div>
        <?php endif?>
        <div><?=$arResult['DETAIL_TEXT']?></div>
    </div>
    <div class="mt-4">
        <a class="inline-flex items-center text-orange hover:opacity-75" href="<?=$arResult['LIST_PAGE_URL']?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg>
            <?=GetMessage('BACK_TO_NEWS')?>
        </a>
    </div>
<?php endif?>
