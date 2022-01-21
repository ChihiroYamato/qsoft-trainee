<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {die();}?>
<div class="my-4 space-y-4 max-w-4xl">
    <hr>
    <p class="text-black text-2xl font-bold mb-4"><?=getMessage('MAP_NAME')?></p>
    <?php $APPLICATION->IncludeComponent(
        'bitrix:map.yandex.view',
        '',
        [
            'API_KEY' => '',
            'CONTROLS' => ['ZOOM','TYPECONTROL'],
            'INIT_MAP_TYPE' => 'MAP',
            'MAP_DATA' => $arResult['MAP_SETTINGS'],
            'MAP_ID' => 'salons',
            'MAP_HEIGHT' => '600',
            'MAP_WIDTH' => '800',
            'OPTIONS' => ['ENABLE_SCROLL_ZOOM'],
            'COMPONENT_TEMPLATE' => '.default',
        ]
    );?>
</div>
