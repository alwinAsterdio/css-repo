<?php
declare(strict_types=1);

$options = [
    'project' => [
        [
            'section_title' => 'Project Details',
            'section_description' => 'Project Details Configuration',
            'fields' => [
                [
                    'name' => 'options[project_id]',
                    'id' => 'project_id',
                    'type' => 'select-ajax',
                    'label' => 'Project ID',
                ],
            ],
        ],
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[primary_section_title]',
                    'id' => 'primary_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Primary Section Title',
                ],
                [
                    'name' => 'options[primary_section_description]',
                    'id' => 'primary_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
                ],
                [
                    'name' => 'options[primary_section_btn_text]',
                    'id' => 'primary_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
                [
                    'name' => 'options[primary_section_newsletter_subs_message]',
                    'id' => 'primary_section_newsletter_subs_message',
                    'type' => 'text',
                    'label' => 'Newsletter Subscription Message',
                    'default' => 'Subscribe!',
                ],
            ],
        ],
        [
            'section_title' => 'Project Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[project_section_btn_text]',
                    'id' => 'project_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
                [
                    'name' => 'options[project_section_call_text]',
                    'id' => 'project_section_call_text',
                    'type' => 'text',
                    'label' => 'Contact Message',
                    'default' => 'Speak to an Agent',
                ],
            ],
        ],
        [
            'section_title' => 'Villas Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[villas_section_title]',
                    'id' => 'villas_section_title',
                    'type' => 'text',
                    'label' => 'Villas Title',
                    'default' => 'Explore the Villas',
                ],
                [
                    'name' => 'options[villas_section_description]',
                    'id' => 'villas_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Villas Description',
                    'default' => 'Villas Description',
                ],

                [
                    'name' => 'options[villas_section_btn_text]',
                    'id' => 'villas_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
                [
                    'name' => 'options[villas_section_image]',
                    'id' => 'villas_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
            ],
        ],
        [
            'section_title' => 'Apartments Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[apartments_section_title]',
                    'id' => 'apartments_section_title',
                    'type' => 'text',
                    'label' => 'Apartments Title',
                    'default' => 'Explore the Apartment',
                ],
                [
                    'name' => 'options[apartments_section_description]',
                    'id' => 'apartments_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Apartments Description',
                    'default' => 'Apartment Description',
                ],

                [
                    'name' => 'options[apartments_section_btn_text]',
                    'id' => 'apartments_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
                [
                    'name' => 'options[apartments_section_image]',
                    'id' => 'apartments_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
            ],
        ],
        [
            'section_title' => 'Amenities Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[amenities_section_title]',
                    'id' => 'amenities_section_title',
                    'type' => 'text',
                    'label' => 'Amenities Title',
                    'Default' => 'Spectacular Amenities',
                ],
                [
                    'name' => 'options[amenities_section_image]',
                    'id' => 'amenities_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[amenities_section_btn_text]',
                    'id' => 'amenities_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
            ],
        ],
        [
            'section_title' => 'Properties Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[properties_section_title]',
                    'id' => 'properties_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Properties Title',
                ],
                [
                    'name' => 'options[properties_section_subtitle]',
                    'id' => 'properties_section_subtitle',
                    'type' => 'text',
                    'label' => 'Subtitle',
                    'default' => 'Properties Subtitle',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_us_section_title]',
                    'id' => 'contact_us_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Contact Us Section Title',
                ],
                [
                    'name' => 'options[contact_us_section_description]',
                    'id' => 'contact_us_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Contact Us Section Description',
                ],
                [
                    'name' => 'options[contact_us_section_btn_text]',
                    'id' => 'contact_us_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Book Your Viewing',
                ],
            ],
        ],
    ],
    'cookie_policy' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'group_width' => 'full',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
            ],
        ],
        [
            'section_title' => 'Cookie Policy',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[cookie_content]',
                    'id' => 'cookie_content',
                    'group_width' => 'full',
                    'type' => 'advance-html-editor',
                    'label' => 'Privacy Content',
                    'default' => 'Privacy Content',
                ],
            ],
        ],
    ],
];