<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
    ],
    [
        'page_title' => 'Dark Theme',
        'page_type' => 'dark',
    ],
    [
        'page_title' => 'Light Theme',
        'page_type' => 'light',
    ],
    [
        'page_title' => 'Form Component',
        'page_type' => 'components/form',
        'options' => [
            'question_list' => [
                'question_title' => [
                    'a1' => 'Have you previously purchased or sold property, or is this your first experience?',
                    'a2' => 'How long have you been in the real estate business?',
                    'a3' => 'What kind of tools or technology do you use to manage your listings and client relationships?',
                ],
            ],
        ],
    ],
];
