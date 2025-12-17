<?php

declare(strict_types=1);

$options = [
    'home' => [
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
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'group_width' => 'full',
                    'type' => 'simple-html-editor',
                    'label' => 'Title',
                    'default' => 'Together, we’ll find your dream modern mansion.',
                ],
            ],
        ],
        [
            'section_title' => 'Locations Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[location_title]',
                    'id' => 'location_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'FEATURED',
                ],
                [
                    'name' => 'options[location_sub_title]',
                    'id' => 'location_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Locations',
                ],
                [
                    'name' => 'location_list',
                    'type' => 'array',
                    'label' => 'Location List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[location_list][location_image]',
                            'id' => 'location_image',
                            'type' => 'file',
                            'label' => 'Image',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[location_list][location_district]',
                            'id' => 'location_district',
                            'type' => 'select',
                            'enable_search' => true,
                            'label' => 'District',
                            'options' => \App\Connector\Reports::propertyDistrictDropdownList(),
                        ],
                        [
                            'name' => 'options[location_list][location_btn_label]',
                            'id' => 'location_btn_label',
                            'type' => 'text',
                            'label' => 'Button Label',
                            'default' => 'VIEW THE PROPERTIES',
                        ],
                    ],
                    'display_fields' => [
                        'location_district' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Featured Properties Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[feature_properties_title]',
                    'id' => 'feature_properties_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'FEATURED',
                ],
                [
                    'name' => 'options[feature_properties_sub_title]',
                    'id' => 'feature_properties_sub_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'PROPERTIES',
                ],
                [
                    'name' => 'options[feature_properties_btn_label]',
                    'id' => 'feature_properties_btn_label',
                    'type' => 'text',
                    'label' => 'Button label',
                    'default' => 'VIEW ALL PROPERTIES',
                ],
            ],
        ],
        [
            'section_title' => 'Carousel Properties Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[carousel_properties_bg_color]',
                    'id' => 'carousel_properties_bg_color',
                    'type' => 'color-picker',
                    'label' => 'Background Color',
                    'default' => '#f0efef',
                ],
                [
                    'name' => 'options[carousel_properties_title]',
                    'id' => 'carousel_properties_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'PROPERTIES',
                ],
                [
                    'name' => 'options[carousel_properties_sub_title]',
                    'id' => 'carousel_properties_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'RECENTLY LISTED',
                ],
                [
                    'name' => 'options[carousel_properties_btn_label]',
                    'id' => 'carousel_properties_btn_label',
                    'type' => 'text',
                    'label' => 'Button label',
                    'default' => 'VIEW ALL PROPERTIES',
                ],
            ],
        ],
        [
            'section_title' => 'About Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[about_us_image]',
                    'id' => 'about_us_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
                [
                    'name' => 'options[about_us_title]',
                    'id' => 'about_us_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'ABOUT US',
                ],
                [
                    'name' => 'options[about_us_sub_title]',
                    'id' => 'about_us_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'THE ULTIMATE IN LOCATION & PRESTIGE',
                ],
                [
                    'name' => 'options[about_us_bg_color]',
                    'id' => 'about_us_bg_color',
                    'type' => 'color-picker',
                    'label' => 'Background Color',
                    'default' => '#f0efef',
                ],
                [
                    'name' => 'options[about_us_description]',
                    'id' => 'about_us_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Our mission is to simplify your life and find the most prestigious properties for you to view.',
                ],
                [
                    'name' => 'options[about_us_btn_label]',
                    'id' => 'about_us_btn_label',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'MORE ABOUT US',
                ],
            ],
        ],
        [
            'section_title' => 'Info Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[info_image]',
                    'id' => 'info_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
                [
                    'name' => 'options[info_title]',
                    'id' => 'info_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'STRIVING FOR EXCELENCE',
                ],
                [
                    'name' => 'options[info_sub_title]',
                    'id' => 'info_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'A TEAM ALWAYS PREPARED TO TAKE CARE OF YOU',
                ],
                [
                    'name' => 'options[infos_description]',
                    'id' => 'infos_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'We are dedicated to helping you find the right property that caters to your unique style and requirements. We leverage our prime network and local knowledge to ensure we meet your standards.',
                ],
                [
                    'name' => 'services_list',
                    'type' => 'array',
                    'label' => 'Services List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[services_list][service_icon]',
                            'id' => 'service_icon',
                            'type' => 'file',
                            'label' => 'Image',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[services_list][service_title]',
                            'id' => 'service_title',
                            'type' => 'text',
                            'label' => 'Title',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[services_list][service_description]',
                            'id' => 'service_description',
                            'type' => 'text',
                            'label' => 'Description',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[services_list][service_url]',
                            'id' => 'service_url',
                            'type' => 'text',
                            'label' => 'Button Url',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[services_list][service_btn_label]',
                            'id' => 'service_btn_label',
                            'type' => 'text',
                            'label' => 'Button Label',
                            'default' => 'LEARN MORE',
                        ],
                    ],
                    'display_fields' => [
                        'service_title' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'News Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[news_title]',
                    'id' => 'news_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'STAY INFORMED',
                ],
                [
                    'name' => 'options[news_sub_title]',
                    'id' => 'news_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Market News',
                ],
                [
                    'name' => 'options[news_btn_label]',
                    'id' => 'news_btn_label',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'MORE ARTICLES',
                ],
            ],
        ],
    ],
    'property' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[brochure_label]',
                    'id' => 'brochure_label',
                    'type' => 'text',
                    'label' => 'Brochure label',
                    'default' => 'DOWNLOAD BROCHURE',
                ],
            ],
        ],
        [
            'section_title' => 'Property Description Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[property_desc_title]',
                    'id' => 'property_desc_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'DESCRIPTION',
                ],
            ],
        ],
        [
            'section_title' => 'Features Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[features_section_title]',
                    'id' => 'features_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'FEATURES',
                ],
            ],
        ],
        [
            'section_title' => 'Enquiry/Map Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[map_title]',
                    'id' => 'map_title',
                    'type' => 'text',
                    'label' => 'Map title',
                    'default' => 'Location',
                ],
                [
                    'name' => 'options[enquiry_title]',
                    'id' => 'enquiry_title',
                    'type' => 'text',
                    'label' => 'Enquiry title',
                    'default' => 'Enquire',
                ],
                [
                    'name' => 'options[enquiry_first_name]',
                    'id' => 'enquiry_first_name',
                    'type' => 'text',
                    'label' => ' First name label',
                    'default' => 'FIRST NAME',
                ],
                [
                    'name' => 'options[enquiry_last_name]',
                    'id' => 'enquiry_last_name',
                    'type' => 'text',
                    'label' => ' Last name label',
                    'default' => 'LAST NAME',
                ],
                [
                    'name' => 'options[enquiry_email]',
                    'id' => 'enquiry_email',
                    'type' => 'text',
                    'label' => ' Email label',
                    'default' => 'EMAIL',
                ],
                [
                    'name' => 'options[enquiry_phone_number]',
                    'id' => 'enquiry_phone_number',
                    'type' => 'text',
                    'label' => ' Phone number label',
                    'default' => 'PHONE NUMBER',
                ],
                [
                    'name' => 'options[enquiry_message]',
                    'id' => 'enquiry_message',
                    'type' => 'text',
                    'label' => ' Message label',
                    'default' => 'MESSAGE',
                ],
                [
                    'name' => 'options[enquiry_submit_btn]',
                    'id' => 'enquiry_submit_btn',
                    'type' => 'text',
                    'label' => 'Submit Button label',
                    'default' => 'Submit',
                ],
            ],
        ],
    ],
    'properties' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_section_sub_title]',
                    'id' => 'primary_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'PROPERTIES',
                ],
                [
                    'name' => 'options[primary_section_title]',
                    'id' => 'primary_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'OUR PREMIUM PROPERTIES',
                ],
                [
                    'name' => 'options[primary_section_image]',
                    'id' => 'primary_section_image',
                    'type' => 'file',
                    'label' => 'Primary Section Image',
                ],
            ],
        ],
    ],
    'blog' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[blog_content]',
                    'id' => 'blog_content',
                    'type' => 'advance-html-editor',
                    'group_width' => 'full',
                    'label' => 'News Content',
                    'default' => 'News',
                ],
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
            ],
        ],
    ],
    'components/footer' => [
        [
            'section_title' => 'Footer Image',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[footer_image]',
                    'id' => 'footer_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
                [
                    'name' => 'options[footer_logo_description]',
                    'id' => 'footer_logo_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Logo description',
                    'default' => '<p>Your real estate</p><p>connection.</p>',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Form Details',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Request a Callback',
                ],
                [
                    'name' => 'options[contact_form_sub_title]',
                    'id' => 'contact_form_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Have a question? Fill in the form below, and we’ll get back to you promptly.',
                ],
                [
                    'name' => 'options[contact_form_name]',
                    'id' => 'contact_form_name',
                    'type' => 'text',
                    'label' => 'Full Name Label',
                    'default' => 'Full Name',
                ],
                [
                    'name' => 'options[contact_form_email]',
                    'id' => 'contact_form_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'Email',
                ],
                [
                    'name' => 'options[contact_form_phone]',
                    'id' => 'contact_form_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Telephone',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Call me back',
                ],
            ],
        ],
    ],
    'contact' => [
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
            ],
        ],
        [
            'section_title' => 'Address Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[address_title]',
                    'id' => 'address_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Sales Office',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Form Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_name]',
                    'id' => 'contact_form_name',
                    'type' => 'text',
                    'label' => 'Full Name Label',
                    'default' => 'Your Name',
                ],
                [
                    'name' => 'options[contact_form_email]',
                    'id' => 'contact_form_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'Your Email',
                ],
                [
                    'name' => 'options[contact_form_phone]',
                    'id' => 'contact_form_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Your Phone',
                ],
                [
                    'name' => 'options[contact_form_message]',
                    'id' => 'contact_form_message',
                    'type' => 'text',
                    'label' => 'Message Label',
                    'default' => 'Your Message(Optional)',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Submit',
                ],
            ],
        ],
    ],
    'about' => [
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
                    'name' => 'options[about_title]',
                    'id' => 'about_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'About',
                ],
            ],
        ],
        [
            'section_title' => 'Team Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[about_team_title]',
                    'id' => 'about_team_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'group_width' => 'full',
                    'default' => 'Our Team',
                ],
                [
                    'name' => 'options[about_content_1]',
                    'id' => 'about_content_1',
                    'type' => 'normal-html-editor',
                    'label' => 'Content 1',
                    'default' => '',
                ],
                [
                    'name' => 'options[about_team_image_1]',
                    'id' => 'about_team_image_1',
                    'type' => 'file',
                    'label' => 'Team Image 1',
                ],
                [
                    'name' => 'options[about_content_2]',
                    'id' => 'about_content_2',
                    'type' => 'normal-html-editor',
                    'label' => 'Content 2',
                    'default' => '',
                ],
                [
                    'name' => 'options[about_team_image_2]',
                    'id' => 'about_team_image_2',
                    'type' => 'file',
                    'label' => 'Team Image 2',
                ],
            ],
        ],
        [
            'section_title' => 'Client Reviews',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[clients_review_title]',
                    'id' => 'clients_review_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Client Reviews',
                ],
                [
                    'name' => 'client_reviews_list',
                    'type' => 'array',
                    'label' => 'List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[client_reviews_list][client_name]',
                            'id' => 'client_name',
                            'type' => 'text',
                            'label' => 'Name',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[client_reviews_list][client_location]',
                            'id' => 'client_location',
                            'type' => 'text',
                            'label' => 'Location',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[client_reviews_list][client_description]',
                            'id' => 'client_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                            'default' => '',
                        ],
                    ],
                    'display_fields' => [
                        'client_name' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Contact Form Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'How can we help?',
                ],
                [
                    'name' => 'options[contact_form_name]',
                    'id' => 'contact_form_name',
                    'type' => 'text',
                    'label' => 'Full Name Label',
                    'default' => 'Full Name',
                ],
                [
                    'name' => 'options[contact_form_email]',
                    'id' => 'contact_form_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'Email',
                ],
                [
                    'name' => 'options[contact_form_phone]',
                    'id' => 'contact_form_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'Phone Number',
                ],
                [
                    'name' => 'options[contact_form_message]',
                    'id' => 'contact_form_message',
                    'type' => 'text',
                    'label' => 'Message Label',
                    'default' => 'Message',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Submit',
                ],

            ],
        ],
    ],
    'blogs' => [
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
                    'name' => 'options[blogs_card_btn]',
                    'id' => 'blogs_card_btn',
                    'type' => 'text',
                    'label' => 'News Card Button Text',
                    'default' => 'Read article',
                ],
            ],
        ],
    ],
    'wishlist' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[section_title]',
                    'id' => 'section_title',
                    'type' => 'text',
                    'group_width' => 'full',
                    'label' => 'Section Title',
                    'default' => 'Your favourites',
                ],
            ],
        ],
    ],
    'discover' => [
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
            ],
        ],
        [
            'section_title' => 'Section List',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'discover_list',
                    'type' => 'array',
                    'label' => 'List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[discover_list][discover_list_title]',
                            'id' => 'discover_list_title',
                            'type' => 'text',
                            'label' => 'Title',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[discover_list][discover_list_description]',
                            'id' => 'discover_list_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[discover_list][discover_list_img]',
                            'id' => 'discover_list_img',
                            'type' => 'file',
                            'label' => 'Background Image',
                            'default' => '',
                        ],
                    ],
                    'display_fields' => [
                        'discover_list_title' => 'Title',
                    ],
                ],
            ],
        ],
    ],
    'cookie_policy' => [
        [
            'section_title' => 'Cookie Policy Content',
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
                    'name' => 'options[cookie_content]',
                    'id' => 'cookie_content',
                    'group_width' => 'full',
                    'type' => 'advance-html-editor',
                    'label' => 'Content',
                    'default' => 'Content',
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
    'list_a_property' => [
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
            ],
        ],
        [
            'section_title' => 'List a Property Form Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Complete the form below to list your property for sale or rent with us.',
                ],
                [
                    'name' => 'options[contact_form_name]',
                    'id' => 'contact_form_name',
                    'type' => 'text',
                    'label' => 'Full Name Label',
                    'default' => 'FULL NAME',
                ],
                [
                    'name' => 'options[contact_form_email]',
                    'id' => 'contact_form_email',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'EMAIL',
                ],
                [
                    'name' => 'options[contact_form_phone]',
                    'id' => 'contact_form_phone',
                    'type' => 'text',
                    'label' => 'Phone Label',
                    'default' => 'PHONE NUMBER',
                ],
                [
                    'name' => 'options[contact_form_beds]',
                    'id' => 'contact_form_beds',
                    'type' => 'text',
                    'label' => 'Bedrooms Label',
                    'default' => 'BEDROOMS',
                ],
                [
                    'name' => 'options[contact_form_baths]',
                    'id' => 'contact_form_baths',
                    'type' => 'text',
                    'label' => 'Bathrooms Label',
                    'default' => 'BATHROOMS',
                ],
                [
                    'name' => 'options[contact_form_property_sale_rent]',
                    'id' => 'contact_form_property_sale_rent',
                    'type' => 'text',
                    'label' => 'Sale/Rent Label',
                    'default' => 'PROPERTY FOR SALE OR RENT?',
                ],
                [
                    'name' => 'options[contact_form_property_type]',
                    'id' => 'contact_form_property_type',
                    'type' => 'text',
                    'label' => 'Property Type Label',
                    'default' => 'PROPERTY TYPE',
                ],
                [
                    'name' => 'options[contact_form_location]',
                    'id' => 'contact_form_location',
                    'type' => 'text',
                    'label' => 'Location Label',
                    'default' => 'LOCATION',
                ],
                [
                    'name' => 'options[contact_form_covered_area]',
                    'id' => 'contact_form_covered_area',
                    'type' => 'text',
                    'label' => 'Covered area Label',
                    'default' => 'COVERED AREA',
                ],
                [
                    'name' => 'options[contact_form_plot_size]',
                    'id' => 'contact_form_plot_size',
                    'type' => 'text',
                    'label' => 'Plot size Label',
                    'default' => 'PLOT SIZE',
                ],
                [
                    'name' => 'options[contact_form_message]',
                    'id' => 'contact_form_message',
                    'type' => 'text',
                    'label' => 'Message Label',
                    'default' => 'DESCRIPTION/NOTES',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Submit',
                ],

            ],
        ],
    ],
];
