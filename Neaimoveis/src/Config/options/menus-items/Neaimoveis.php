<?php
declare(strict_types=1);

$options = [
    [
        'section_title' => 'Add a new link',
        'section_description' => '',
        'fields' => [
            [
                'name' => 'menu_label',
                'type' => 'text',
                'label' => 'Label',
            ],
            [
                'name' => 'menu_type',
                'type' => 'select',
                'label' => 'Type',
                'options' => \App\Utils\Config::getList('menus-items', 'menu_type'),
                'default' => 'url',
            ],
            [
                'name' => 'options[menu_item_position]',
                'id' => 'menu_item_position',
                'type' => 'select',
                'label' => 'Menu Item Position',
                'options' => \App\Utils\Config::getList('menus-items', 'menu_item_position'),
                'default' => 'right',
            ],
            [
                'name' => 'options[menu_url]',
                'id' => 'menu_url',
                'type' => 'text',
                'label' => 'Url',
                'visible_if' => [
                    'menu_type' => [
                        'url',
                    ],
                ],
            ],
            [
                'name' => 'options[menu_class]',
                'id' => 'menu_class',
                'type' => 'text',
                'label' => 'Class',
            ],
            [
                'name' => 'options[pages_id]',
                'id' => 'pages_id',
                'type' => 'select-ajax',
                'label' => 'Page',
                'visible_if' => [
                    'menu_type' => [
                        'page',
                    ],
                ],
            ],
            [
                'name' => 'options[menu_icon]',
                'id' => 'menu_icon',
                'type' => 'select-ajax',
                'label' => 'Icon',
            ],
            [
                'name' => 'options[include_label]',
                'id' => 'include_label',
                'type' => 'select',
                'label' => 'Include Label',
                'options' => [
                    'no' => 'No',
                    'yes' => 'Yes',
                ],
                'default' => 'yes',
            ],
            [
                'name' => 'options[menu_icon_position]',
                'id' => 'menu_icon_position',
                'type' => 'select',
                'label' => 'Icon Position',
                'options' => \App\Utils\Config::getList('menus-items', 'menu_icon_position'),
                'default' => 'left',
            ],
            [
                'name' => 'options[phone_number]',
                'id' => 'phone_number',
                'type' => 'text',
                'label' => 'Phone Number',
                'visible_if' => [
                    'menu_type' => [
                        'phone',
                    ],
                ],
            ],
            [
                'name' => 'options[whatsapp_number]',
                'id' => 'whatsapp_number',
                'type' => 'text',
                'label' => 'WhatsApp Number',
                'visible_if' => [
                    'menu_type' => [
                        'whatsapp',
                    ],
                ],
            ],
        ],
    ],
];
