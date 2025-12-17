<?php

declare(strict_types=1);

$options = [
    'Neaimoveis' => [
        [
            'menu_name' => 'Main Menu',
            'menu_position' => 'main',
            'menu_items' => [
                [
                    'menu_label' => 'For Sale',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/comprar/madrid',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'For Rent',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/alquilar/madrid',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'Projects',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/projects',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'Services',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/services',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'Partners',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/partners',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
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
                        'menu_icon_position' => 'right',
                        'menu_item_position' => 'right',
                    ],
                ],
                [
                    'menu_label' => 'Login',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/login',
                        'menu_class' => '',
                        'menu_icon' => 'regular_circle-user',
                        'include_label' => 'no',
                        'menu_icon_position' => 'right',
                        'menu_item_position' => 'right',
                    ],
                ],
            ],
        ],
        [
            'menu_name' => 'Main Menu CTA',
            'menu_position' => 'cta_menu',
            'menu_items' => [
                [
                    'menu_label' => 'Add Listing',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/list-your-property',
                        'menu_class' => 'btn-pill',
                        'menu_item_position' => 'right',
                    ],
                ],
            ],
        ],
        [
            'menu_name' => 'Footer Menu',
            'menu_position' => 'footer',
            'menu_items' => [
                [
                    'menu_label' => 'For Sale',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/comprar/madrid',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'For Rent',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/properties/alquilar/madrid',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Projects',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/projects',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'List Your Property',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/list-your-property',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'About Us',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/about-us',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Contact Us',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/contact-us',
                        'menu_class' => '',
                    ],
                ],
            ],
        ],
    ],
];
