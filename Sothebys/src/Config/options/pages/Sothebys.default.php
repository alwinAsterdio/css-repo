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
                'enable_search' => true,
                'options' => \App\Utils\Config::getListByThemeByKey('pages', 'page_type', $child_theme ?? $theme ?? ''),
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
            [
                'name' => 'seo_title',
                'type' => 'title',
                'label' => 'SEO',
            ],
            [
                'name' => 'options[seo_title]',
                'id' => 'seo_title',
                'type' => 'text',
                'field_class' => 'seo-variables',
                'label' => 'Title',
                'description' => 'This will be used for social media sharing. If left empty it will use the page title. If you use % it will allow you to use SEO variables.',
            ],
            [
                'name' => 'options[featured_photo]',
                'id' => 'featured_photo',
                'type' => 'file',
                'label' => 'Featured Photo',
                'description' => 'This will be used for social media sharing. If left empty it will use the hero image.',
            ],
            [
                'name' => 'options[description_short]',
                'id' => 'description_short',
                'type' => 'simple-html-editor',
                'label' => 'Short Description',
                'description' => 'This will be used for social media sharing.',
            ],
        ],
    ],
];
