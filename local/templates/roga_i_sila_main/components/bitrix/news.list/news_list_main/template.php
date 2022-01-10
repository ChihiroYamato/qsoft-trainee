<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>

<section class="news-block-inverse px-6 py-4">
    <div>
        <p class="inline-block text-3xl text-white font-bold mb-4"><?=getMessage('NEWS_BLOCK_NAME')?></p>
        <span class="inline-block text-gray-200 pl-1"> / <a href="<?=$arResult['LIST_PAGE_URL']?>" class="inline-block pl-1 text-gray-200 hover:text-orange"><b><?=getMessage('NEWS_ALL_LINK')?></b></a></span>
    </div>
    <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
        <?php foreach ($arResult['ITEMS'] as $item) :?>
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    <a class="block w-full h-full hover:opacity-75" href="<?=$item['DETAIL_PAGE_URL']?>"><img src="<?=$item['PREVIEW_PICTURE']['SRC'] ?? NO_IMAGE_PATH?>" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-white font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
                        </div>
                        <p class="text-gray-300 text-base">
                            <a class="hover:text-orange" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['PREVIEW_TEXT']?></a>
                        </p>
                    </div>
                    <?php if (isset($item['TAGS']) && ! empty($item['TAGS'])) :?>
                        <div>
                            <?php foreach (explode(',', $item['TAGS']) as $tag) :?>
                                <span class="text-sm text-white italic rounded bg-orange px-2"><?=$tag?></span>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 italic"><?=$item['DISPLAY_ACTIVE_FROM']?></p>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>
