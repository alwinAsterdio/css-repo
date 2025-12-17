<?php

declare(strict_types=1);

$options = [
    'Mansion' => [
        [
            'menu_name' => 'Main Menu',
            'menu_position' => 'main',
            'menu_items' => [
                [
                    'menu_label' => 'BUY',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/for_sale',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'RENT',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/for_rent',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'NEWS',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/news',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'DISCOVER',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/discover',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'ABOUT',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/about',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'CONTACT US',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/contact',
                        'menu_class' => 'no-underline btn btn-primary btn-md',
                        'menu_item_position' => 'right',
                    ],
                ],
                [
                    'menu_label' => 'WISHLIST',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/wishlist',
                        'menu_class' => '',
                        'menu_item_position' => 'right',
                        'menu_icon' => 'solid_heart',
                        'include_label' => 'no',
                        'menu_icon_position' => 'left',
                    ],
                ],
            ],
        ],
    ],
];
