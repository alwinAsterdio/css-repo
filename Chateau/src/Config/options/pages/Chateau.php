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
                    'default' => 'Primary Section Title',
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
                    'default' => 'Luxury Villa',
                ],
                [
                    'name' => 'options[feature_properties_btn_label]',
                    'id' => 'feature_properties_btn_label',
                    'type' => 'text',
                    'label' => 'Button label',
                    'default' => 'View All Properties',
                ],
                [
                    'name' => 'options[feature_properties_description]',
                    'id' => 'feature_properties_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Featured Properties Description',
                ],
            ],
        ],
        [
            'section_title' => 'Info Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[info_sub_title]',
                    'id' => 'info_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Blog Sub Title',
                ],
                [
                    'name' => 'options[info_title]',
                    'id' => 'info_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Blog Title',
                ],
                [
                    'name' => 'options[info_description]',
                    'id' => 'info_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => 'Blog Description',
                ],
                [
                    'name' => 'options[info_bg_image]',
                    'id' => 'info_bg_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[info_btn_label]',
                    'id' => 'info_btn_label',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'More',
                ],
                [
                    'name' => 'options[info_btn_url]',
                    'id' => 'info_btn_url',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => '',
                ],
            ],
        ],
        [
            'section_title' => 'About Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[about_us_sub_title]',
                    'id' => 'about_us_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'About Us Sub Title',
                ],
                [
                    'name' => 'options[about_us_title]',
                    'id' => 'about_us_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'About Us Title',
                ],
                [
                    'name' => 'options[about_us_description]',
                    'id' => 'about_us_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'About Us Description',
                ],
                [
                    'name' => 'options[about_us_youtube_link]',
                    'id' => 'about_us_youtube_link',
                    'type' => 'text',
                    'label' => 'Youtube Link',
                ],
                [
                    'name' => 'options[about_us_btn_label]',
                    'id' => 'about_us_btn_label',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'More About Us',
                ],
                [
                    'name' => 'options[about_us_bg_color]',
                    'id' => 'about_us_bg_color',
                    'type' => 'color-picker',
                    'label' => 'Background Color',
                    'default' => '#f4f2ee',
                ],
            ],
        ],
        [
            'section_title' => 'Testimonials Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[testimonials_sub_title]',
                    'id' => 'testimonials_sub_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'TESTIMONIALS',
                ],
                [
                    'name' => 'options[testimonials_title]',
                    'id' => 'testimonials_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'SOME OF OUR HAPPY CLIENTS.',
                ],
                [
                    'name' => 'testimonial_title_1',
                    'type' => 'title',
                    'label' => 'Testimonial 1',
                ],
                [
                    'name' => 'options[testimonials_name_1]',
                    'id' => 'testimonials_name_1',
                    'type' => 'text',
                    'label' => 'Name',
                ],
                [
                    'name' => 'options[testimonials_description_1]',
                    'id' => 'testimonials_description_1',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                ],
                [
                    'name' => 'testimonial_title_2',
                    'type' => 'title',
                    'label' => 'Testimonial 2',
                ],
                [
                    'name' => 'options[testimonials_name_2]',
                    'id' => 'testimonials_name_2',
                    'type' => 'text',
                    'label' => 'Name',
                ],
                [
                    'name' => 'options[testimonials_description_2]',
                    'id' => 'testimonials_description_2',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                ],
                [
                    'name' => 'testimonial_title_3',
                    'type' => 'title',
                    'label' => 'Testimonial 3',
                ],
                [
                    'name' => 'options[testimonials_name_3]',
                    'id' => 'testimonials_name_3',
                    'type' => 'text',
                    'label' => 'Name',
                    'default' => '',
                ],
                [
                    'name' => 'options[testimonials_description_3]',
                    'id' => 'testimonials_description_3',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => '',
                ],
                [
                    'name' => 'testimonial_title_4',
                    'type' => 'title',
                    'label' => 'Testimonial 4',
                ],
                [
                    'name' => 'options[testimonials_name_4]',
                    'id' => 'testimonials_name_4',
                    'type' => 'text',
                    'label' => 'Name',
                    'default' => '',
                ],
                [
                    'name' => 'options[testimonials_description_4]',
                    'id' => 'testimonials_description_4',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => '',
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
                    'name' => 'options[primary_bg_image]',
                    'id' => 'primary_bg_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
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
                    'default' => 'PROPERTY DESCRIPTION',
                ],
            ],
        ],
        [
            'section_title' => 'Enquiry Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[enquiry_title]',
                    'id' => 'enquiry_title',
                    'type' => 'text',
                    'group_width' => 'full',
                    'label' => 'Enquiry title',
                    'default' => 'ENQUIRE',
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
                [
                    'name' => 'options[enquiry_bg_color]',
                    'id' => 'enquiry_bg_color',
                    'type' => 'color-picker',
                    'label' => ' Background Color',
                    'default' => '#f4f2ee',
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
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
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
            'section_title' => 'Newsletter Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[newsletter_title]',
                    'id' => 'newsletter_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'NEWSLETTER',
                ],
                [
                    'name' => 'options[newsletter_email_label]',
                    'id' => 'newsletter_email_label',
                    'type' => 'text',
                    'label' => 'Email Label',
                    'default' => 'Email',
                ],
                [
                    'name' => 'options[newsletter_btn]',
                    'id' => 'newsletter_btn',
                    'type' => 'text',
                    'label' => 'Submit Label',
                    'default' => 'Subscribe',
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
            'section_title' => 'Contact Form Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'group_width' => 'full',
                    'label' => 'Title',
                    'default' => 'SEND US A MESSAGE',
                ],
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
        [
            'section_title' => 'Map Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[coordinates]',
                    'id' => 'coordinates',
                    'type' => 'text',
                    'label' => 'Coordinates',
                    'default' => '',
                ],
                [
                    'name' => 'options[map_title]',
                    'id' => 'map_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'HOW CAN WE HELP?',
                ],
                [
                    'name' => 'options[map_description]',
                    'id' => 'map_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => '<p>Thank you for considering us as to assist you with your property requirements.</p>',
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
                    'default' => 'OUR TEAM',
                ],
                [
                    'name' => 'options[about_team_description]',
                    'id' => 'about_team_description',
                    'type' => 'normal-html-editor',
                    'label' => 'Description',
                    'default' => '<p>We are the best real estate agency around and an independent company established in 2020.  We provide services for rent and sale of high quality housing, we are engaged in investments, we assist in immigration and legal aspects, as well as in property management.</p><br/>
                    <p>We can say safely that real estate is a passion for us, and seeing the happiness on the faces of our customers who believe and trust our recommendations is our reward.</p>',
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
                    'default' => 'GET IN TOUCH TODAY TO FIND YOUR DREAM PROPERTY.',
                ],
                [
                    'name' => 'options[contact_form_bg_color]',
                    'id' => 'contact_form_bg_color',
                    'type' => 'color-picker',
                    'label' => 'Background Color',
                    'default' => '#f4f2ee',
                ],
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
                    'default' => 'Read more',
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
                    'label' => 'Section Title',
                    'default' => 'YOUR WISHLIST',
                ],
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Primary Section Image',
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
            'section_title' => '1st Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[discover_row_1_title]',
                    'id' => 'discover_row_1_title',
                    'type' => 'text',
                    'label' => 'Title',
                ],
                [
                    'name' => 'options[discover_row_1_image]',
                    'id' => 'discover_row_1_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[discover_row_1_description]',
                    'id' => 'discover_row_1_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                ],
            ],
        ],
        [
            'section_title' => '2nd Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[discover_row_2_title]',
                    'id' => 'discover_row_2_title',
                    'type' => 'text',
                    'label' => 'Title',
                ],
                [
                    'name' => 'options[discover_row_2_image]',
                    'id' => 'discover_row_2_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[discover_row_2_description]',
                    'id' => 'discover_row_2_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                ],
            ],
        ],
        [
            'section_title' => '3rd Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[discover_row_3_title]',
                    'id' => 'discover_row_3_title',
                    'type' => 'text',
                    'label' => 'Title',
                ],
                [
                    'name' => 'options[discover_row_3_image]',
                    'id' => 'discover_row_3_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[discover_row_3_description]',
                    'id' => 'discover_row_3_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                ],
            ],
        ],
        [
            'section_title' => '4th Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[discover_row_4_title]',
                    'id' => 'discover_row_4_title',
                    'type' => 'text',
                    'label' => 'Title',
                ],
                [
                    'name' => 'options[discover_row_4_image]',
                    'id' => 'discover_row_4_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[discover_row_4_description]',
                    'id' => 'discover_row_4_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
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
];
