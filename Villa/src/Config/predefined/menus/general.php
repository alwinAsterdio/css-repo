<?php

declare(strict_types=1);

$options = [
    'Villa' => [
        [
            'menu_name' => 'Main Menu',
            'menu_position' => 'main',
            'menu_items' => [
                [
                    'menu_label' => 'Buy',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/for_sale',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Rent',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/for_rent',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Discover',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/discover',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'About',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/about',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'News',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/news',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Contact',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/contact',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Wishlist',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/wishlist',
                        'menu_class' => '',
                        'menu_icon' => 'regular_heart',
                        'include_label' => 'no',
                        'menu_icon_position' => 'left',
                    ],
                ],
            ],
        ],
    ],
];
