<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php if (! empty($arResult['ITEMS'])) :?>
<div class="space-y-4 max-w-4xl">
    <?php
    $position = false;
    foreach ($arResult['ITEMS'] as $item) :
        $position = (bool) ($position ^ true);
        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], GetMessage('EDIT_LINK_TEXT'));
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], GetMessage('DELETE_LINK_TEXT'), ['CONFIRM' => GetMessage('DELETE_CONFIRM')]);
    ?>
        <div id="<?=$this->GetEditAreaId($item['ID'])?>">
            <?php if ($position) :?>
                <div class="w-full flex p-4">
                    <a class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden" href="<?=$item['DETAIL_PAGE_URL']?>">
                        <img src="<?=$item['PREVIEW_PICTURE']?>" class="w-full h-full object-cover" alt="">
                    </a>
                    <div class="px-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <a class="text-black font-bold text-xl mb-2 hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
                            <div class="text-base space-y-2">
                                <p class="text-gray-400"><?=$item['PROPERTY_ADDRESS_VALUE']?></p>
                                <p class="text-black"><?=$item['PROPERTY_PHONE_VALUE']?></p>
                                <p class="text-sm"><?=getMessage('WORK_HOURS')?>:<br><?=$item['PROPERTY_WORK_HOURS_VALUE']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else :?>
                <div class="w-full flex justify-end bg-gray-100 p-4">
                    <div class="px-4 flex flex-col justify-between leading-normal text-right">
                        <div class="mb-8">
                            <a class="text-black font-bold text-xl mb-2 hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
                            <div class="text-base space-y-2">
                                <p class="text-gray-400"><?=$item['PROPERTY_ADDRESS_VALUE']?></p>
                                <p class="text-black"><?=$item['PROPERTY_PHONE_VALUE']?></p>
                                <p class="text-sm"><?=getMessage('WORK_HOURS')?>:<br><?=$item['PROPERTY_WORK_HOURS_VALUE']?></p>
                            </div>
                        </div>
                    </div>
                    <a class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden" href="<?=$item['DETAIL_PAGE_URL']?>">
                        <img src="<?=$item['PREVIEW_PICTURE']?>" class="w-full h-full object-cover" alt="">
                    </a>
                </div>
            <?php endif?>
        </div>
    <?php endforeach?>
</div>
<?php endif?>
