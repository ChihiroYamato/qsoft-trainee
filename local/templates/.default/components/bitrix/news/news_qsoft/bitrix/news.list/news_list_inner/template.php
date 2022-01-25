<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php if (! empty($arResult['ITEMS'])) :?>
    <?php if ($arParams['DISPLAY_TOP_PAGER']) :?>
        <?=$arResult['NAV_STRING']?>
    <?php endif?>
    <div class="space-y-4">
        <?php foreach ($arResult['ITEMS'] as $item) :?>
            <?php
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], GetMessage('EDIT_LINK_TEXT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], GetMessage('DELETE_LINK_TEXT'), ['CONFIRM' => GetMessage('DELETE_CONFIRM')]);
            ?>
            <div class="w-full flex" id="<?=$this->GetEditAreaId($item['ID'])?>">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="<?=$item['DETAIL_PAGE_URL']?>"><img src="<?=$item['PREVIEW_PICTURE']['SRC'] ?? NO_IMAGE_PATH?>" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 leading-normal">
                    <div class="mb-8 space-y-2">
                        <div class="text-black font-bold text-xl">
                            <a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
                        </div>
                        <p class="text-gray-600 text-base">
                            <a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['PREVIEW_TEXT']?></a>
                        </p>
                        <?php if (! empty($item['TAGS'])) :?>
                            <div>
                                <?php foreach (explode(',', $item['TAGS']) as $tag) :?>
                                    <span class="text-sm text-white italic rounded bg-orange px-2"><?=$tag?></span>
                                <?php endforeach?>
                            </div>
                        <?php endif?>
                        <div class="flex items-center">
                            <p class="text-sm text-gray-400 italic"><?=$item['DISPLAY_ACTIVE_FROM']?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
    <?php if ($arParams['DISPLAY_BOTTOM_PAGER']) :?>
        <?=$arResult['NAV_STRING']?>
    <?php endif?>
<?php endif?>
