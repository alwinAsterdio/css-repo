<?php
declare(strict_types=1);

$options = [
    'site_details' => [
        [
            'section_title' => 'Website Name',
            'section_description' => 'Provide a new name for your website',
            'fields' => [
                [
                    'name' => 'site_title',
                    'type' => 'text',
                    'label' => 'Name of Website',
                    'required' => true,
                ],
                [
                    'name' => 'theme',
                    'type' => 'hidden',
                    'label' => 'Theme',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Details',
            'section_description' => 'The information users will use to contact you',
            'fields' => [
                [
                    'name' => 'email',
                    'type' => 'text',
                    'label' => 'Email',
                    'required' => true,
                ],
                [
                    'name' => 'phone',
                    'type' => 'text',
                    'label' => 'Phone',
                    'required' => true,
                ],
                [
                    'name' => 'address',
                    'type' => 'simple-html-editor',
                    'label' => 'Address',
                    'default' => '<p>Address Line 1</p><p>Address Line 2</p><p>Country</p>',
                ],
            ],
        ],
        [
            'section_title' => 'Social Media',
            'section_description' => 'The information users will use to contact you',
            'fields' => [
                [
                    'name' => 'options[social_media_facebook]',
                    'id' => 'social_media_facebook',
                    'type' => 'text',
                    'label' => 'Facebook',
                ],
                [
                    'name' => 'options[social_media_twitter]',
                    'id' => 'social_media_twitter',
                    'type' => 'text',
                    'label' => 'Twitter',
                ],
                [
                    'name' => 'options[social_media_linkedin]',
                    'id' => 'social_media_linkedin',
                    'type' => 'text',
                    'label' => 'LinkedIn',
                ],
                [
                    'name' => 'options[social_media_youtube]',
                    'id' => 'social_media_youtube',
                    'type' => 'text',
                    'label' => 'Youtube',
                ],
                [
                    'name' => 'options[social_media_tiktok]',
                    'id' => 'social_media_tiktok',
                    'type' => 'text',
                    'label' => 'TikTok',
                ],
                [
                    'name' => 'options[social_media_instagram]',
                    'id' => 'social_media_instagram',
                    'type' => 'text',
                    'label' => 'Instagram',
                ],
            ],
        ],
    ],
    'appearance' => [
        [
            'section_title' => 'Appearance',
            'section_description' => 'Style & personalize your site',
            'fields' => [
                [
                    'name' => 'options[style_primary_color]',
                    'id' => 'style_primary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Primary Color',
                    'default' => '#e0bb58',
                ],
                [
                    'name' => 'options[style_secondary_color]',
                    'id' => 'style_secondary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Secondary Color',
                    'default' => '#160301',
                ],
                [
                    'name' => 'options[style_tertiary_color]',
                    'id' => 'style_tertiary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Tertiary Color',
                    'default' => '#FFFFFF',
                ],
                [
                    'name' => 'options[brochure_template_id]',
                    'id' => 'brochure_template_id',
                    'type' => 'select-ajax',
                    'label' => 'Brochure Template',
                    'default' => \App\Connector\DynamicTemplates::getIdByName('Comprehensive Brochure'),
                ],
                [
                    'name' => 'logo',
                    'type' => 'file',
                    'label' => 'Menu logo',
                ],
                [
                    'name' => 'options[favicon]',
                    'id' => 'favicon',
                    'type' => 'file',
                    'label' => 'Favicon',
                ],
            ],
        ],
        [
            'section_title' => 'Generic Labels',
            'section_description' => 'Button labels for pages',
            'fields' => [
                [
                    'name' => 'options[more_btn_label]',
                    'id' => 'more_btn_label',
                    'type' => 'text',
                    'label' => 'More Button Label',
                    'default' => 'Read More',
                ],
                [
                    'name' => 'options[no_results_label]',
                    'id' => 'no_results_label',
                    'type' => 'text',
                    'label' => 'No Results Label',
                    'default' => 'Results Not Found',
                ],
            ],
        ],
        [
            'section_title' => 'Map',
            'section_description' => 'Map Settings',
            'fields' => [
                [
                    'name' => 'options[map_marker]',
                    'id' => 'map_marker',
                    'type' => 'file',
                    'label' => 'Pin',
                ],
                [
                    'name' => 'options[map_marker_active]',
                    'id' => 'map_marker_active',
                    'type' => 'file',
                    'label' => 'Pin when active',
                ],
                [
                    'name' => 'options[map_marker_width]',
                    'id' => 'map_marker_width',
                    'type' => 'text',
                    'label' => 'Pin width (px)',
                    'default' => '30',
                ],
                [
                    'name' => 'options[map_marker_height]',
                    'id' => 'map_marker_height',
                    'type' => 'text',
                    'label' => 'Pin height (px)',
                    'default' => '55',
                ],
                [
                    'name' => 'options[map_coords_random]',
                    'id' => 'map_coords_random',
                    'type' => 'select',
                    'label' => 'Random coordinates',
                    'placeholder' => 'Random coordinates',
                    'options' => [
                        'inherit' => 'Inherit From Qobrix',
                        'random' => 'Random Coordinates',
                    ],
                    'default' => 'inherit',
                ],
                [
                    'name' => 'options[map_coords_random_radius]',
                    'id' => 'map_coords_random_radius',
                    'type' => 'text',
                    'label' => 'Random Coordinates Radius(m)',
                    'placeholder' => 'Random Coordinates Radius(m)',
                    'default' => '500',
                ],
                [
                    'name' => 'map_cluster_settings',
                    'type' => 'title',
                    'label' => 'Map Cluster Settings',
                ],
                [
                    'name' => 'options[map_cluster]',
                    'id' => 'map_cluster',
                    'type' => 'select',
                    'label' => 'Enable Cluster',
                    'placeholder' => 'Enable Cluster',
                    'options' => [
                        'no' => 'No',
                        'yes' => 'Yes',
                    ],
                    'default' => 'yes',
                ],
                [
                    'name' => 'map_circle_settings',
                    'type' => 'title',
                    'label' => 'Map Circle Settings',
                ],
                [
                    'name' => 'options[map_circle]',
                    'id' => 'map_circle',
                    'type' => 'select',
                    'label' => 'Enable Circle',
                    'placeholder' => 'Enable Circle',
                    'options' => [
                        'no' => 'No',
                        'yes' => 'Yes',
                    ],
                    'default' => 'yes',
                ],
                [
                    'name' => 'options[map_circle_color]',
                    'id' => 'map_circle_color',
                    'type' => 'color-picker',
                    'label' => 'Color',
                    'placeholder' => 'Color',
                    'default' => '#000000',
                ],
                [
                    'name' => 'options[map_circle_fill_color]',
                    'id' => 'map_circle_fill_color',
                    'type' => 'color-picker',
                    'label' => 'Fill Color',
                    'placeholder' => 'Fill Color',
                    'default' => '#000000',
                ],
                [
                    'name' => 'options[map_circle_opacity]',
                    'id' => 'map_circle_opacity',
                    'type' => 'text',
                    'label' => 'Opacity',
                    'placeholder' => 'Opacity',
                    'default' => '0.5',
                ],
                [
                    'name' => 'options[map_circle_radius]',
                    'id' => 'map_circle_radius',
                    'type' => 'text',
                    'label' => 'Radius(m)',
                    'placeholder' => 'Radius(m)',
                    'default' => '1000',
                ],
            ],
        ],
    ],
];
