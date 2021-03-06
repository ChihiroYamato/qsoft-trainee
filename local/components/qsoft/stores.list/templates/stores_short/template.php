<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php if (! empty($arResult['ITEMS'])) :?>
<div class="flex-1">
    <div>
        <p class="inline-block text-3xl text-black font-bold mb-4"><?=getMessage('STORES_BLOCK_NAME')?></p>
        <?php if (! empty($arParams['DETAILS_URL'])) :?>
            <span class="inline-block pl-1"> / <a href="<?=$arParams['DETAILS_URL']?>" class="inline-block pl-1 text-gray-600 hover:text-orange"><b><?=getMessage('STORES_ALL_LINK')?></b></a></span>
        <?php endif?>
    </div>
    <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
        <?php foreach ($arResult['ITEMS'] as $item) :?>
            <?php
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], GetMessage('EDIT_LINK_TEXT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], GetMessage('DELETE_LINK_TEXT'), ['CONFIRM' => GetMessage('DELETE_CONFIRM')]);
            ?>
            <div class="w-full flex" id="<?=$this->GetEditAreaId($item['ID'])?>">
                <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="<?=$item['DETAIL_PAGE_URL']?>"><img src="<?=$item['PREVIEW_PICTURE']?>" class="w-full h-full object-cover" alt=""></a>
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-black font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
                        </div>
                        <div class="text-base space-y-2">
                            <p class="text-gray-400"><?=$item['PROPERTY_ADDRESS_VALUE']?></p>
                            <p class="text-black"><?=$item['PROPERTY_PHONE_VALUE']?></p>
                            <p class="text-sm"><?=getMessage('WORK_HOURS')?>:<br><?=$item['PROPERTY_WORK_HOURS_VALUE']?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</div>
<?php endif?>
