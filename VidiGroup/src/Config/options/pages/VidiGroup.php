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
                    'label' => 'Button Label',
                    'default' => 'BOOK A VIEWING',
                ],
                [
                    'name' => 'options[primary_section_brochure_label]',
                    'id' => 'primary_section_brochure_label',
                    'type' => 'text',
                    'label' => 'Brochure Label',
                    'default' => 'Brochure',
                ],
            ],
        ],
        [
            'section_title' => 'Property Essentials Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[property_essentials_section_title]',
                    'id' => 'property_essentials_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Property Essentials',
                ],
                [
                    'name' => 'options[property_essentials_section_sub_title]',
                    'id' => 'property_essentials_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub-Title',
                    'default' => 'Review the property’s main details & features',
                ],
                [
                    'name' => 'options[property_essentials_section_lead_btn_text]',
                    'id' => 'property_essentials_section_lead_btn_text',
                    'type' => 'text',
                    'label' => ' Lead Form Button Text',
                    'default' => 'BOOK A VIEWING',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_us_section_image]',
                    'id' => 'contact_us_section_image',
                    'type' => 'file',
                    'label' => 'Desktop Background Image',
                ],
                [
                    'name' => 'options[contact_us_section_mobile_image]',
                    'id' => 'contact_us_section_mobile_image',
                    'type' => 'file',
                    'label' => 'Mobile Image',
                ],
                [
                    'name' => 'options[contact_us_section_title]',
                    'id' => 'contact_us_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'See it for Yourself',
                ],
                [
                    'name' => 'options[contact_us_section_sub_title]',
                    'id' => 'contact_us_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub-Title',
                    'default' => 'Get in touch today & start living your best life',
                ],
                [
                    'name' => 'options[contact_us_section_lead_btn_text]',
                    'id' => 'contact_us_section_lead_btn_text',
                    'type' => 'text',
                    'label' => ' Button Text',
                    'default' => 'BOOK A VIEWING',
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
                    'name' => 'options[primary_section_btn_1_text]',
                    'id' => 'primary_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'MAKE ENQUIRY',
                ],
                [
                    'name' => 'options[primary_section_btn_2_text]',
                    'id' => 'primary_section_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button 2 Text',
                    'default' => 'EXPLORE PROJECT',
                ],
                [
                    'name' => 'options[primary_section_description]',
                    'id' => 'primary_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
                ],
            ],
        ],
        [
            'section_title' => 'Project Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[project_section_logo]',
                    'id' => 'project_section_logo',
                    'type' => 'file',
                    'label' => 'Logo',
                ],
                [
                    'name' => 'options[project_section_btn_1_text]',
                    'id' => 'project_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'MAKE ENQUIRY',
                ],
                [
                    'name' => 'options[project_section_btn_2_text]',
                    'id' => 'project_section_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button 2 Text',
                    'default' => 'AMENITIES',
                ],
            ],
        ],
        [
            'section_title' => 'Amenites Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[amenities_section_image]',
                    'id' => 'amenities_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[amenities_section_btn_1_text]',
                    'id' => 'amenities_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'MAKE ENQUIRY',
                ],
                [
                    'name' => 'options[amenities_section_btn_2_text]',
                    'id' => 'amenities_section_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button 2 Text',
                    'default' => 'Location',
                ],
            ],
        ],
        [
            'section_title' => 'Location Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[location_section_btn_1_text]',
                    'id' => 'location_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'MAKE ENQUIRY',
                ],
                [
                    'name' => 'options[location_section_btn_2_text]',
                    'id' => 'location_section_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button 2 Text',
                    'default' => 'GALLERY',
                ],
                [
                    'name' => 'options[location_section_brochure_text]',
                    'id' => 'location_section_brochure_text',
                    'type' => 'text',
                    'label' => 'Brochure Text',
                    'default' => 'BROCHURE',
                ],
            ],
        ],
        [
            'section_title' => 'Properties Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[properties_section_btn_1_text]',
                    'id' => 'properties_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'MAKE ENQUIRY',
                ],
                [
                    'name' => 'options[properties_section_btn_2_text]',
                    'id' => 'properties_section_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button 2 Text',
                    'default' => 'ABOUT US',
                ],
                [
                    'name' => 'options[properties_section_description]',
                    'id' => 'properties_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Properties Description',
                ],
            ],
        ],
        [
            'section_title' => 'About Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[about_us_section_image]',
                    'id' => 'about_us_section_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[about_us_section_btn_1_text]',
                    'id' => 'about_us_section_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button 1 Text',
                    'default' => 'SAY HELLO',
                ],
                [
                    'name' => 'options[about_us_section_description]',
                    'id' => 'about_us_section_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'About Us Description',
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
                    'name' => 'options[contact_us_section_sub_title]',
                    'id' => 'contact_us_section_sub_title',
                    'type' => 'text',
                    'label' => 'Sub-Title',
                    'default' => 'Contact Us Section Sub-Title',
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
                    'name' => 'options[contact_us_section_lead_title]',
                    'id' => 'contact_us_section_lead_title',
                    'type' => 'text',
                    'label' => 'Lead Form Title',
                    'default' => 'Contact Us Section Lead Form Title',
                ],
                [
                    'name' => 'options[contact_us_section_lead_sub_title]',
                    'id' => 'contact_us_section_lead_sub_title',
                    'type' => 'text',
                    'label' => 'Lead Form Sub-Title',
                    'default' => 'Contact Us Section Lead Form Sub-Title',
                ],
                [
                    'name' => 'options[contact_us_section_lead_btn_text]',
                    'id' => 'contact_us_section_lead_btn_text',
                    'type' => 'text',
                    'label' => ' Lead Form Button Text',
                    'default' => 'MAKE ENQUIRY',
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
];
