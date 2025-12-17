<?php
declare(strict_types=1);

$options = [
    [
        'section_title' => 'Page Details',
        'section_description' => 'Provide the page details',
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
                'options' => \App\Utils\Config::getListByThemeByKey('pages', 'page_type', $theme ?? ''),
            ],
            [
                'name' => 'page_slug',
                'type' => 'text',
                'label' => 'Slug',
                'placeholder' => 'auto-generated',
                'prefix' => '/',
                'prefix_position' => 'left',
            ],
            [
                'name' => 'visibility',
                'type' => 'select',
                'label' => 'Visibility',
                'options' => [
                    'public' => 'Public',
                    'draft' => 'Draft',
                ],
                'default' => 'public',
            ],
            [
                'name' => 'publish_from',
                'type' => 'date-picker',
                'label' => 'Publish',
                'default' => 'now',
            ],
        ],
    ],
];
