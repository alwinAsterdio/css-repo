<?php

declare(strict_types=1);

$options = [
    'Caixa' => [
        [
            'menu_name' => 'Main Menu',
            'menu_position' => 'main',
            'menu_items' => [
                [
                    'menu_label' => 'Simulador de hipoteca',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => 'mortgage-btn',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'Cómo funciona',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
                [
                    'menu_label' => 'Contacto',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'menu_item_position' => 'center',
                    ],
                ],
            ],
        ],
        [
            'menu_name' => 'Footer Menu',
            'menu_position' => 'footer',
            'menu_items' => [
                [
                    'menu_label' => 'Simulador de hipoteca',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => 'mortgage-btn',
                    ],
                ],
                [
                    'menu_label' => 'Sobre nosotros',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'template_name' => 'about',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Cómo funciona',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'template_name' => 'how_it_works',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Contacto',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'template_name' => 'contact',
                        'menu_class' => '',
                    ],
                ],
            ],
        ],
        [
            'menu_name' => 'User Menu',
            'menu_position' => 'user_menu',
            'menu_items' => [
                [
                    'menu_label' => 'Mi perfil',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Favoritos',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'template_name' => 'wishlist',
                    ],
                ],
                [
                    'menu_label' => 'Búsquedas guardadas',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'template_name' => 'saved_searches',
                    ],
                ],
                [
                    'menu_label' => 'Notificaciones',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                    ],
                ],
            ],
        ],
        [
            'menu_name' => 'Sub Footer Menu',
            'menu_position' => 'sub_footer',
            'menu_items' => [
                [
                    'menu_label' => 'Aviso legal',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'template_name' => 'terms_and_conditions',
                    ],
                ],
                [
                    'menu_label' => 'Política de privacidad',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'template_name' => 'privacy_policy',
                    ],
                ],
                [
                    'menu_label' => 'Política de cookies',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                        'template_name' => 'cookie_policy',
                    ],
                ],
                [
                    'menu_label' => 'Términos y condiciones',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Responsabilidad corporativa',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Declaración de accesibilidad',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/declaracion-accesibilidad',
                        'menu_class' => '',
                    ],
                ],
            ],
        ],
    ],
];
