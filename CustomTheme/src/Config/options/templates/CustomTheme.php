<?php

declare(strict_types=1);

$options = [
    'html' => [
        [
            'section_title' => 'Custom Html Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'template_fields',
                    'type' => 'field-list',
                    'class' => 'btn btn-pill btn-primary btn-validate-domain',
                    'options' => [],
                    'group_width' => 'full',
                    'label' => 'Fields that can be used inside the template html',
                ],
                [
                    'name' => 'options[html_content]',
                    'id' => 'html_content',
                    'type' => 'textarea',
                    'rows' => '8',
                    'group_width' => 'full',
                    'label' => 'Html',
                ],
            ],
        ],
    ],
];
