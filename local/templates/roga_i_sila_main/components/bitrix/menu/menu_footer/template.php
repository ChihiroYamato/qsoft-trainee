<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

if (! empty($arResult)):
?>
<div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
    <p class="text-3xl text-black font-bold mb-4">Информация</p>
    <nav>
        <ul class="list-inside  bullet-list-item">
        <?php foreach($arResult as $arItem): ?>
            <li><a class="<?=$arItem['SELECTED'] ? 'text-orange cursor-default' : 'text-' . ($arItem['PARAMS']['colore'] ?? 'gray') . '-600 hover:text-orange'?>" href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></li>
        <?php endforeach ?>
        </ul>
    </nav>
</div>
<?php endif ?>
