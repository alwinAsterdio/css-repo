<?php

declare(strict_types=1);

$options = [
    'Chateau' => [
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
                    ],
                ],
                [
                    'menu_label' => 'RENT',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/for_rent',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'DISCOVER',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/discover',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'BLOG',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/blogs',
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
                    'menu_label' => 'Contact',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/contact',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Phone',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => 'tel:+1123-456-7890',
                        'menu_class' => '',
                        'menu_icon' => 'solid_phone',
                        'include_label' => 'no',
                        'menu_icon_position' => 'left',
                    ],
                ],
                [
                    'menu_label' => 'Whatsapp',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => 'https://wa.me/+9000000000',
                        'menu_class' => '',
                        'menu_icon' => 'brands_whatsapp',
                        'include_label' => 'no',
                        'menu_icon_position' => 'left',
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
        [
            'menu_name' => 'Footer Menu',
            'menu_position' => 'footer',
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
                    'menu_label' => 'Blog',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/blogs',
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
                    ],
                ],
            ],
        ],
    ],
];
