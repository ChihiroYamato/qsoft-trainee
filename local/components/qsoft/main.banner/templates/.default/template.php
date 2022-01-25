<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<?php if (! empty($arResult['BANNERS_PROPERTIES'])) :?>
    <section class="bg-white">
        <div data-slick-carousel-auto>
            <?php foreach ($arResult['BANNERS_PROPERTIES'] as $item) :?>
                <div class="relative banner">
                    <a href="<?=$item['URL']?>">
                        <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="<?=$item['IMAGE_SRC']?>" alt="" title=""></div>
                        <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                            <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase"><?=$item['NAME']?></h1>
                            <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold"><?=$item['CODE']?></h2>
                        </div>
                    </a>
                </div>
            <?php endforeach?>
        </div>
    </section>
<?php endif?>
