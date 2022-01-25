<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

// echo '<pre>';
// var_dump($arResult);
// echo '</pre>';
?>

<?php if (! empty($arResult['ITEMS'])) :?>
<section class="pb-4 px-6">
    <p class="inline-block text-3xl text-black font-bold mb-4"><?=getMessage('BLOCK_NAME')?></p>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
        <?php foreach ($arResult['ITEMS'] as $item) :?>
            <?php
            $currencyChar = $item['CURRENCY'] === 'RUB' ? '₽' : '';
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], GetMessage('EDIT_LINK_TEXT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], GetMessage('DELETE_LINK_TEXT'), ['CONFIRM' => GetMessage('DELETE_CONFIRM')]);
            ?>
            <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4" id="<?=$this->GetEditAreaId($item['ID'])?>">
                <a class="block w-full h-40" href="<?=$item['DETAIL_PAGE_URL']?>"><img class="w-full h-full hover:opacity-90 object-cover" src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>"></a>
                <div class="px-6 py-4">
                    <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></div>
                    <p class="text-grey-darker text-base">
                        <span class="inline-block"><?=number_format($item['PRICE'], 0, '.', ' ') . ' ' . $currencyChar?></span>
                        <?php if (isset($item['OLD_PRICE'])) :?>
                            <span class="inline-block line-through pl-6 text-gray-400"><?=number_format($item['OLD_PRICE'], 0, '.', ' ') . ' ' . $currencyChar?></span>
                        <?php endif?>
                    </p>
                </div>
            </div>
        <?php endforeach?>
    </div>
</section>
<?php endif?>
