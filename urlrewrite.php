<?php
$arUrlRewrite = [
    2 => [
        'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
        'RULE' => 'alias=$1',
        'ID' => NULL,
        'PATH' => '/desktop_app/router.php',
        'SORT' => 100,
    ],
    3 => [
        'CONDITION' => '#^/online/(/?)([^/]*)#',
        'RULE' => '',
        'ID' => NULL,
        'PATH' => '/desktop_app/router.php',
        'SORT' => 100,
    ],
    9 => [
        'CONDITION' => '#^/personal/order/#',
        'RULE' => '',
        'ID' => 'bitrix:sale.personal.order',
        'PATH' => '/personal/order/index.php',
        'SORT' => 100,
    ],
    13 => [
        'CONDITION' => '#^/company/news/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/company/news/index.php',
        'SORT' => 100,
    ],
    10 => [
        'CONDITION' => '#^/personal/#',
        'RULE' => '',
        'ID' => 'bitrix:sale.personal.section',
        'PATH' => '/personal/index.php',
        'SORT' => 100,
    ],
    12 => [
        'CONDITION' => '#^/catalog/#',
        'RULE' => '',
        'ID' => 'bitrix:catalog',
        'PATH' => '/catalog/index.php',
        'SORT' => 100,
    ],
    11 => [
        'CONDITION' => '#^/store/#',
        'RULE' => '',
        'ID' => 'bitrix:catalog.store',
        'PATH' => '/store/index.php',
        'SORT' => 100,
    ],
    7 => [
        'CONDITION' => '#^/news/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/news/index.php',
        'SORT' => 100,
    ],
];
