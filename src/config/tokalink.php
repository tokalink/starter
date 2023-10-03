<?php

return [
    'app_name' => env('APP_NAME', 'Tokalink'),
    'admin_prefix' => env('ADMIN_PREFIX_URL', 'admin'),
    'theme' => env('THEME_ADMIN', 'theme3'),
    'menu' => [
        'Main' => [
            'icon' => 'fas fa-cart-plus',
            'route' => 'order',
            'permission' => 'master',
            'child' => [],
        ],
        'Master' => [
            'icon' => 'fa fa-database',
            'route' => '',
            'permission' => 'master',
            'child' => [
                'Kategori' => [
                    'icon' => 'fa fa-users',
                    'route' => 'kategori',
                    'permission' => 'member',
                    'child' => []
                ],
                'Produk' => [
                    'icon' => 'fa fa-book',
                    'route' => 'produk',
                    'permission' => 'peraturan',
                    'child' => []
                ],
            ]
        ],
    ]
];
