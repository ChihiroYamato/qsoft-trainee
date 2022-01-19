<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

if (! empty($arResult)):
?>
    <ul class="space-y-2">
    <?php foreach($arResult as $arItem): ?>
        <li><a class="<?=$arItem['SELECTED'] ? 'text-orange cursor-default' : 'text-' . ($arItem['PARAMS']['colore'] ?? 'gray') . '-600 hover:text-orange'?>" href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></li>
    <?php endforeach ?>
    </ul>
<?php endif ?>
