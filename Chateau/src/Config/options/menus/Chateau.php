<?php

declare(strict_types=1);

$options = [
    [
        'section_title' => 'Menu details',
        'section_description' => 'Provide the menu details',
        'fields' => [
            [
                'name' => 'menu_name',
                'type' => 'text',
                'label' => 'Menu Name',
            ],
            [
                'name' => 'menu_position',
                'type' => 'radio',
                'label' => 'Menu Position',
                'options' => \App\Utils\Config::getList('menus', 'advance_position'),
            ],
        ],
    ],
];