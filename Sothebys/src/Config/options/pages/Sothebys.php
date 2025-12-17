<?php
declare(strict_types=1);

$options = [
    'property' => [
        [
            'section_title' => 'Property Details',
            'section_description' => 'Property Details Configuration',
            'fields' => [
                [
                    'name' => 'options[property_id]',
                    'id' => 'property_id',
                    'type' => 'select-ajax',
                    'label' => 'Property ID',
                ],
            ],
        ],
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_section_btn_text]',
                    'id' => 'primary_section_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'BOOK A VIEWING',
                ],
            ],
        ],
        [
            'section_title' => 'Description Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[description_section_title]',
                    'id' => 'description_section_title',
                    'type' => 'simple-html-editor',
                    'label' => 'Title',
                    'default' => '<p>Property</p><p>description</p>',
                ],
            ],
        ],
        [
            'section_title' => 'Property Essentials Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[property_essentials_section_enabled]',
                    'id' => 'property_essentials_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'property_essentials_section_title',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[property_essentials_section_title]',
                    'id' => 'property_essentials_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Property Essentials',
                ],
            ],
        ],
        [
            'section_title' => 'Floor Plan Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[floor_plan_section_enabled]',
                    'id' => 'floor_plan_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'floor_plan_section_title',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[floor_plan_section_title]',
                    'id' => 'floor_plan_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Floor Plan',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_us_section_enabled]',
                    'id' => 'contact_us_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'contact_us_section_image',
                        'contact_us_section_title',
                        'contact_us_section_sub_title',
                        'contact_us_section_description',
                        'contact_form_title',
                        'contact_form_name',
                        'contact_form_phone',
                        'contact_form_email',
                        'contact_form_agreement',
                        'contact_form_btn',
                        'contact_us_form',

                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[contact_us_section_image]',
                    'id' => 'contact_us_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[contact_us_section_title]',
                    'id' => 'contact_us_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Book your viewing NOW',
                ],
                [
                    'name' => 'options[contact_us_section_sub_title]',
                    'id' => 'contact_us_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub-Title',
                    'default' => 'for a worry-free comfortable life in the Mediteranean',
                ],
                [
                    'name' => 'options[contact_us_section_description]',
                    'id' => 'contact_us_section_description',
                    'type' => 'text',
                    'label' => 'Description',
                    'default' => 'Our dedicated experts will give you the end-to-end quality service to help you choose the right property',
                ],
                [
                    'name' => 'contact_us_form',
                    'type' => 'title',
                    'label' => 'Enquiry Form',
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
    ],
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
                    'name' => 'options[primary_section_image]',
                    'id' => 'primary_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[primary_section_title]',
                    'id' => 'primary_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Unparalleled urban living in Paphos',
                ],
                [
                    'name' => 'options[primary_section_sub_title]',
                    'id' => 'primary_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Ready to move in!',
                ],
                [
                    'name' => 'options[primary_section_description]',
                    'id' => 'primary_section_description',
                    'type' => 'advance-html-editor',
                    'label' => 'Description',
                    'default' => '<ul>
                    <li>Proximity to the sea & the city centre</li>
                    <li>Completed key-ready project</li>
                    <li>High quality finishes and furniture</li>
                    <li>Good rental potential</li>
                    <li>Suitable for Permanent Residency</li>
                </ul>',
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
            'section_title' => 'Info Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[info_section_enabled]',
                    'id' => 'info_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'info_array',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'info_array',
                    'type' => 'array',
                    'label' => 'List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[info_array][info_title]',
                            'id' => 'info_title',
                            'type' => 'text',
                            'label' => 'Title',
                        ],
                        [
                            'name' => 'options[info_array][info_description]',
                            'id' => 'info_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                        ],
                    ],
                    'display_fields' => [
                        'info_title' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Gallery Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[gallery_section_enabled]',
                    'id' => 'gallery_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [],
                    'default' => 'on',
                ],
            ],
        ],
        [
            'section_title' => 'Features Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[features_section_enabled]',
                    'id' => 'features_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'features_section_title',
                        'features_array',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[features_section_title]',
                    'id' => 'features_section_title',
                    'type' => 'text',
                    'label' => 'Section Title',
                    'default' => 'Features',
                    'group_width' => 'full',
                ],
                [
                    'name' => 'features_array',
                    'type' => 'array',
                    'label' => 'Features List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[features_array][feature_img]',
                            'id' => 'feature_img',
                            'type' => 'file',
                            'label' => 'Image',
                        ],
                        [
                            'name' => 'options[features_array][feature_title]',
                            'id' => 'feature_title',
                            'type' => 'text',
                            'label' => 'Title',
                        ],
                        [
                            'name' => 'options[features_array][feature_description]',
                            'id' => 'feature_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                        ],
                    ],
                    'display_fields' => [
                        'feature_title' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Properties Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[properties_section_enabled]',
                    'id' => 'properties_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'properties_section_title',
                        'properties_status_list',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[properties_section_title]',
                    'id' => 'properties_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Available options',
                ],
                [
                    'name' => 'properties_status_list',
                    'type' => 'array',
                    'label' => 'Status Color List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[properties_status_list][status]',
                            'id' => 'status',
                            'type' => 'select',
                            'label' => 'Status',
                            'options' => \App\Connector\Property::getFieldList('status'),

                        ],
                        [
                            'name' => 'options[properties_status_list][color]',
                            'id' => 'color',
                            'type' => 'color-picker',
                            'label' => 'Status Color',
                            'default' => '#C29B40',
                        ],
                    ],
                    'display_fields' => [
                        'status' => 'Status',
                        'color' => 'Color',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Location Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[location_section_enabled]',
                    'id' => 'location_section_enabled',
                    'type' => 'special-checkbox',
                    'label' => 'Show this section',
                    'group_elements' => [
                        'location_section_title',
                        'location_city_icon',
                    ],
                    'default' => 'on',
                ],
                [
                    'name' => 'options[location_section_title]',
                    'id' => 'location_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Location',
                ],
                [
                    'name' => 'options[location_city_icon]',
                    'id' => 'location_city_icon',
                    'type' => 'file',
                    'label' => 'Icon',
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
                    'name' => 'options[book_viewing_btn_label]',
                    'id' => 'book_viewing_btn_label',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'REQUEST A CALLBACK',
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
                    'type' => 'normal-html-editor',
                    'label' => 'Privacy Content',
                    'default' => 'Privacy Content',
                ],
            ],
        ],
    ],
    'privacy_policy' => [
        [
            'section_title' => 'Privacy Policy',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'group_width' => 'full',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[privacy_content]',
                    'id' => 'privacy_content',
                    'group_width' => 'full',
                    'type' => 'advance-html-editor',
                    'label' => 'Content',
                    'default' => 'Content',
                ],
            ],
        ],
    ],
    'components/request-call-back' => [
        [
            'section_title' => 'Request callback Info',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[request_callback_title]',
                    'id' => 'request_callback_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Request a callback',
                ],
                [
                    'name' => 'options[request_callback_name]',
                    'id' => 'request_callback_name',
                    'type' => 'text',
                    'label' => 'Name Label',
                    'default' => 'Name',
                ],
                [
                    'name' => 'options[request_callback_phone]',
                    'id' => 'request_callback_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Phone',
                ],
                [
                    'name' => 'options[request_callback_email]',
                    'id' => 'request_callback_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'E-mail',
                ],
                [
                    'name' => 'options[request_callback_message]',
                    'id' => 'request_callback_message',
                    'type' => 'text',
                    'label' => 'Message Label',
                    'default' => 'Message',
                ],
                [
                    'name' => 'options[request_callback_agreement]',
                    'id' => 'request_callback_agreement',
                    'type' => 'simple-html-editor',
                    'label' => 'Agreement text',
                    'default' => '<p>I agree with the terms of <a href="/privacy-policy" target="_blank">Privacy Policy</a></p>',
                ],
                [
                    'name' => 'options[request_callback_newsletter]',
                    'id' => 'request_callback_newsletter',
                    'type' => 'simple-html-editor',
                    'label' => 'Newsletter text',
                    'default' => '<p>Yes, I would like to get more information from Cyprus Sotheby’s International Realty by E-mail</p>',
                ],
                [
                    'name' => 'options[request_callback_btn]',
                    'id' => 'request_callback_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'SUBMIT',
                ],
            ],
        ],
    ],
    'thank-you' => [
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
                [
                    'name' => 'options[thank_you_title]',
                    'id' => 'thank_you_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Thank You',
                ],
                [
                    'name' => 'options[thank_you_sub_title]',
                    'id' => 'thank_you_sub_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'for Contacting Us!',
                ],
                [
                    'name' => 'options[thank_you_descr_1]',
                    'id' => 'thank_you_descr_1',
                    'group_width' => 'full',
                    'type' => 'normal-html-editor',
                    'label' => 'Description 1',
                    'default' => 'Your message has been received & our expert will be in touch with you shortly.',
                ],
                [
                    'name' => 'options[thank_you_descr_2]',
                    'id' => 'thank_you_descr_2',
                    'group_width' => 'full',
                    'type' => 'normal-html-editor',
                    'label' => 'Description 2',
                    'default' => '<p>Stay ahead of the curve with our latest real estate news, upcoming webinars, and exclusive event announcements by connecting with us on <a href="/">Telegram</a></p>',
                ],
            ],
        ],
    ],
];
