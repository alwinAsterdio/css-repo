<?php
declare(strict_types=1);

$options = [
    'top_properties' => [
        [
            'section_title' => 'Properties search list',
            'section_description' => 'The properties selected on this list will be visible only on the frontend',
            'fields' => [
                [
                    'name' => 'properties_list',
                    'type' => 'properties-list',
                    'label' => 'Properties',
                    'group_width' => 'full',
                    'limit' => 50,
                    'display_fields' => [
                        'ref' => 'Ref',
                        'name' => 'Name',
                        'property_type' => 'Property Type',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_section_title]',
                    'id' => 'primary_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'TOP properties of Pafos',
                ],
                [
                    'name' => 'options[primary_section_sub_title]',
                    'id' => 'primary_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Ready to move in!',
                ],
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[primary_section_bg_color]',
                    'id' => 'primary_section_bg_color',
                    'type' => 'color-picker',
                    'label' => 'Background Color',
                    'default' => '#002349bd',
                ],
                [
                    'name' => 'form_section',
                    'id' => 'form_section',
                    'type' => 'title',
                    'label' => 'Enquiry Form',
                ],
                [
                    'name' => 'options[contact_form_primary_enabled]',
                    'id' => 'contact_form_primary_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show enquiry form',
                    'group_elements' => [
                        'contact_form_title',
                        'contact_form_name',
                        'contact_form_phone',
                        'contact_form_email',
                        'contact_form_agreement',
                        'contact_form_btn',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Book a discovery call',
                ],
                [
                    'name' => 'options[contact_form_name]',
                    'id' => 'contact_form_name',
                    'type' => 'text',
                    'label' => 'Name Label',
                    'default' => 'Name',
                ],
                [
                    'name' => 'options[contact_form_phone]',
                    'id' => 'contact_form_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Phone',
                ],
                [
                    'name' => 'options[contact_form_email]',
                    'id' => 'contact_form_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'E-mail',
                ],
                [
                    'name' => 'options[contact_form_agreement]',
                    'id' => 'contact_form_agreement',
                    'type' => 'simple-html-editor',
                    'label' => 'Agreement text',
                    'default' => '<p>I agree with the terms of <a href="/privacy-policy" target="_blank">Privacy Policy</a> and to being contacted by Cyprus Sotheby’s International Realty.</p>',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'SUBMIT',
                ],
            ],
        ],
        [
            'section_title' => 'Book your viewing Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[book_viewing_section_enabled]',
                    'id' => 'book_viewing_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'book_viewing_title',
                        'book_viewing_sub_title',
                        'book_viewing_description',
                        'book_viewing_btn_label',
                        'book_viewing_bg_image',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[book_viewing_title]',
                    'id' => 'book_viewing_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Book your viewing NOW',
                ],
                [
                    'name' => 'options[book_viewing_sub_title]',
                    'id' => 'book_viewing_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'for a worry-free comfortable life in the Mediteranean',
                ],
                [
                    'name' => 'options[book_viewing_description]',
                    'id' => 'book_viewing_description',
                    'type' => 'text',
                    'label' => 'Description',
                    'default' => 'Our dedicated experts will give you the end-to-end quality service to help you choose the right property',
                ],
                [
                    'name' => 'options[book_viewing_bg_image]',
                    'id' => 'book_viewing_bg_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
            ],
        ],

        [
            'section_title' => 'About Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[about_us_section_enabled]',
                    'id' => 'about_us_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'about_us_title',
                        'about_us_description',
                        'about_us_image',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[about_us_title]',
                    'id' => 'about_us_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'The winner of European Property Awards',
                ],
                [
                    'name' => 'options[about_us_description]',
                    'id' => 'about_us_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => '<p>On June 27, 2023, Cyprus Sotheby’s International Realty became a laureate of the European Property Awards - the largest, most prestigious, and recognized award in the real estate sector in the region.</p><p></br></p><p>Our agency competed with the best real estate professionals across Europe. Cyprus Sotheby’s International Realty received awards in the categories of \'Best Real Estate Agency\' (Agency Single Office) and \'Best Real Estate Agency Website\' in Cyprus.</p><p></br></p><p>Learn more about the European Property Awards ceremony on our website here.</p>',
                ],
                [
                    'name' => 'options[about_us_image]',
                    'id' => 'about_us_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
            ],
        ],
        [
            'section_title' => 'International realty Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[international_section_enabled]',
                    'id' => 'international_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'international_realty_title',
                        'international_realty_sub_title',
                        'international_realty_list',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[international_realty_title]',
                    'id' => 'international_realty_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Cyprus Sotheby’s International Realty',
                ],
                [
                    'name' => 'options[international_realty_sub_title]',
                    'id' => 'international_realty_sub_title',
                    'type' => 'simple-html-editor',
                    'label' => 'Sub Title',
                    'default' => '<p>Cyprus Sotheby’s International Realty</p><p>Leading Cyprus Real Estate and Investment Specialists</p>',
                ],
                [
                    'name' => 'international_realty_list',
                    'type' => 'array',
                    'label' => 'List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[international_realty_list][int_realty_img]',
                            'id' => 'int_realty_img',
                            'type' => 'file',
                            'label' => 'Image',
                        ],
                        [
                            'name' => 'options[international_realty_list][int_realty_title]',
                            'id' => 'int_realty_title',
                            'type' => 'text',
                            'label' => 'Title',
                        ],
                        [
                            'name' => 'options[international_realty_list][int_realty_description]',
                            'id' => 'int_realty_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                        ],
                    ],
                    'display_fields' => [
                        'int_realty_title' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Footer Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[footer_section_enabled]',
                    'id' => 'footer_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'footer_title',
                        'footer_sub_title',
                        'footer_item_list',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[footer_title]',
                    'id' => 'footer_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Sotheby\'s International Realty in numbers',
                ],
                [
                    'name' => 'options[footer_sub_title]',
                    'id' => 'footer_sub_title',
                    'type' => 'text',
                    'label' => 'Sub-Title',
                    'default' => 'We are proud of our achievements and do not stop at it',
                ],
                [
                    'name' => 'footer_item_list',
                    'type' => 'array',
                    'label' => 'List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[footer_item_list][footer_item_title]',
                            'id' => 'footer_item_title',
                            'type' => 'text',
                            'label' => 'Title',
                        ],
                        [
                            'name' => 'options[footer_item_list][footer_item_value]',
                            'id' => 'footer_item_value',
                            'type' => 'text',
                            'label' => 'Text',
                        ],
                    ],
                    'display_fields' => [
                        'footer_item_title' => 'Title',
                        'footer_item_value' => 'Text',
                    ],
                ],
            ],
        ],
    ],
];
