<?php
if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}

$isChild = false;
?>
<?php if (! empty($arResult)) :?>
<nav class="order-1">
    <ul class="block lg:flex">
        <?php foreach($arResult as $item) :?>
            <?php if ($arParams['MAX_LEVEL'] === 2 && $item['DEPTH_LEVEL'] > 1) :
                $isChild = true;
                ?>
                <li><a class="block py-2 px-4 text-<?=$item['SELECTED'] ? 'orange' : 'black'?> hover:text-orange hover:bg-gray-100" href="<?=$item['LINK']?>"><?=$item['TEXT']?></a></li>
            <?php else :?>
                <?php if ($isChild) :
                    $isChild = false;
                    ?>
                    </ul>
                <?php endif?>
                <li class="group">
                    <a class="inline-block p-4 text-<?=$item['SELECTED'] ? 'orange' : 'black'?> font-bold <?php if ($item['IS_PARENT']) :?>border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow<?php else :?>hover:text-orange<?php endif?>" href="<?=$item['LINK']?>">
                    <?=$item['TEXT']?>
                    <?php if ($arParams['MAX_LEVEL'] === 2 && $item['IS_PARENT']) :?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                    <?php else :?>
                        </a>
                    <?php endif?>
            <?php endif?>
        <?php endforeach?>
    </ul>
</nav>
<?php endif?>
