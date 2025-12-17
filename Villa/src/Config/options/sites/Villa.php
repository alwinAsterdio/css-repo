<?php
declare(strict_types=1);

$options = [
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
                    'default' => '#000000',
                ],
                [
                    'name' => 'options[style_secondary_color]',
                    'id' => 'style_secondary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Secondary Color',
                    'default' => '#FFFFFF',
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
                [
                    'name' => 'options[brochure_template_id]',
                    'id' => 'brochure_template_id',
                    'type' => 'select-ajax',
                    'label' => 'Brochure Template',
                    'default' => \App\Connector\DynamicTemplates::getIdByName('Comprehensive Brochure'),
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
