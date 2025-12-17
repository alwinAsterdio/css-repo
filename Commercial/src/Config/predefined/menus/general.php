<?php

declare(strict_types=1);

$options = [
    'Commercial' => [
        [
            'menu_name' => 'Main Menu',
            'menu_position' => 'main',
            'menu_items' => [
                [
                    'menu_label' => 'Ιδιώτες & Επιχειρήσεις',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/#services',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Προσφορές',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/#offers',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Νέα',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/#blog',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Ποιοι είμαστε',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/#about-us',
                        'menu_class' => '',
                    ],
                ],
                [
                    'menu_label' => 'Επικοινωνία',
                    'menu_type' => 'url',
                    'options' => [
                        'menu_url' => '/#contact-us',
                        'menu_class' => '',
                    ],
                ],
            ],
        ],
    ],
];
