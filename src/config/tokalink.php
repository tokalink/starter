<?php

return [
    'app_name' => env('APP_NAME', 'Tokalink'),
    'admin_prefix' => env('ADMIN_PREFIX_URL', 'admin'),
    'theme' => env('THEME_ADMIN', 'theme3'),
    'logo_web' => "/assets-admin/theme2/img/logo.png",
    'facebook_login' => env('FACEBOOK_LOGIN', false),
    'google_login' => env('GOOGLE_LOGIN', false),
    'twitter_login' => env('TWITTER_LOGIN', false),
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
