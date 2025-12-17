<?php
declare(strict_types=1);

$options = [
    [
        'section_title' => 'Templates Details',
        'section_description' => 'Provide the templates details',
        'fields' => [
            [
                'name' => 'page_title',
                'type' => 'text',
                'label' => 'Title',
                'group_width' => 'full',
            ],
            [
                'name' => 'page_type',
                'type' => 'select',
                'label' => 'Template',
                'options' => \App\Utils\Config::getListByThemeByKey('templates', 'page_type', $theme ?? ''),
            ],
            [
                'name' => 'visibility',
                'type' => 'select',
                'label' => 'Visibility',
                'options' => [
                    'private' => 'Private',
                    'global' => 'Global',
                ],
                'default' => 'private',
            ],
        ],
    ],
];
