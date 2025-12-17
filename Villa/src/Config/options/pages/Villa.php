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
                    'name' => 'options[primary_subtitle]',
                    'id' => 'primary_subtitle',
                    'type' => 'text',
                    'label' => 'Sub title',
                    'default' => 'FIND THOUSANDS OF PROPERTIES!',
                ],
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'simple-html-editor',
                    'label' => 'Title',
                    'default' => 'Your dream villa 
                    is just one click away.',
                ],
            ],
        ],
        [
            'section_title' => 'Luxury Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[villas_subtitle]',
                    'id' => 'villas_subtitle',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'FIND YOUR',
                ],
                [
                    'name' => 'options[villas_title]',
                    'id' => 'villas_title',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Luxury Villa',
                ],
                [
                    'name' => 'options[villas_description]',
                    'id' => 'villas_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => 'Let us guide you through the world of real estate and provide you with the tools and knowledge to make the right choice.',
                ],
                [
                    'name' => 'luxury_list',
                    'type' => 'array',
                    'label' => 'Luxury Services List',
                    'group_width' => 'full',
                    'fields' => [
                        [
                            'name' => 'options[luxury_list][luxury_title]',
                            'id' => 'luxury_title',
                            'type' => 'text',
                            'label' => 'Title',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[luxury_list][luxury_description]',
                            'id' => 'luxury_description',
                            'type' => 'simple-html-editor',
                            'label' => 'Description',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[luxury_list][luxury_icon]',
                            'id' => 'luxury_icon',
                            'type' => 'file',
                            'label' => 'Icon',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[luxury_list][luxury_image]',
                            'id' => 'luxury_image',
                            'type' => 'file',
                            'label' => 'Background Image',
                            'default' => '',
                        ],
                        [
                            'name' => 'options[luxury_list][luxury_url]',
                            'id' => 'luxury_url',
                            'type' => 'text',
                            'label' => 'Url',
                            'default' => '',
                        ],
                    ],
                    'display_fields' => [
                        'luxury_title' => 'Title',
                    ],
                ],
            ],
        ],
        [
            'section_title' => 'Featured Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[featured_subtitle]',
                    'id' => 'featured_subtitle',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Featured',
                ],
                [
                    'name' => 'options[featured_title]',
                    'id' => 'featured_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Properties',
                ],
                [
                    'name' => 'options[featured_btn]',
                    'id' => 'featured_btn',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'View All Properties',
                ],
            ],
        ],
        [
            'section_title' => 'Team Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[team_image]',
                    'id' => 'team_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
                [
                    'name' => 'options[team_subtitle]',
                    'id' => 'team_subtitle',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'GET TO KNOW',
                ],
                [
                    'name' => 'options[team_title]',
                    'id' => 'team_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Your Real Estate Team',
                ],
                [
                    'name' => 'options[team_description]',
                    'id' => 'team_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => '<p>Steering the wheels of Villa Realty, our founder Michael, carries decades of experience within the real estate and construction sectors.</p><p><br></p><p>We provide services for rent and sale of high quality housing, we are engaged in investments, we assist in immigration and legal aspects, as well as in property management.</p><p><br></p><p>We can say safely that real estate is a passion for us, and seeing the happiness on the faces of our customers who believe and trust our recommendations is our reward.</p>',
                ],
                [
                    'name' => 'options[team_btn]',
                    'id' => 'team_btn',
                    'type' => 'text',
                    'label' => 'Button',
                    'default' => 'Meet the team',
                ],
            ],
        ],
        [
            'section_title' => 'Quality and Support Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[quality_section_subtitle]',
                    'id' => 'quality_section_subtitle',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'GUARANTEED',
                ],
                [
                    'name' => 'options[quality_section_title]',
                    'id' => 'quality_section_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Quality & Support',
                ],
                [
                    'name' => 'options[quality_section_description]',
                    'id' => 'quality_section_description',
                    'type' => 'simple-html-editor',
                    'label' => 'Description',
                    'default' => 'Our aim is to provide high quality properties suitable for both investment and personal living with our dedicated real estate consultants always available to support our customers.
                    We Villa Realty you can be sure of investing with full confidence.',
                ],
                [
                    'name' => 'options[quality_section_btn]',
                    'id' => 'quality_section_btn',
                    'type' => 'text',
                    'label' => 'Button',
                    'default' => 'Learn More',
                ],
                [
                    'name' => 'options[quality_section_image]',
                    'id' => 'quality_section_image',
                    'type' => 'file',
                    'label' => 'Image',
                ],
            ],
        ],
        [
            'section_title' => 'Memories Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[memories_bg_img]',
                    'id' => 'memories_bg_img',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[memories_subtitle]',
                    'id' => 'memories_subtitle',
                    'type' => 'text',
                    'label' => 'Sub title',
                    'default' => 'A HOME FOR THE FUTURE',
                ],
                [
                    'name' => 'options[memories_title]',
                    'id' => 'memories_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Build new memories',
                ],
                [
                    'name' => 'options[memories_description]',
                    'id' => 'memories_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Ever dreamed of a place where summer never ends, a place that empowers and inspires your creativity, a place that can make you truly happy?',
                ],
            ],
        ],
        [
            'section_title' => 'News Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[news_subtitle]',
                    'id' => 'news_subtitle',
                    'type' => 'text',
                    'label' => 'Sub title',
                    'default' => 'FOLLOW',
                ],
                [
                    'name' => 'options[news_title]',
                    'id' => 'news_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Our Property News',
                ],
                [
                    'name' => 'options[news_description]',
                    'id' => 'news_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Follow our weekly blog, offering tips and insights about the Real Estate and Mortgage markets.',

                ],
                [
                    'name' => 'options[more_news_btn]',
                    'id' => 'more_news_btn',
                    'type' => 'text',
                    'label' => 'Load More Button',
                    'default' => 'View All News',
                ],

            ],
        ],
        [
            'section_title' => 'Contact Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_form_title]',
                    'id' => 'contact_form_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Request a callback',
                ],
                [
                    'name' => 'options[contact_form_first_name]',
                    'id' => 'contact_form_first_name',
                    'type' => 'text',
                    'label' => 'First Name Label',
                    'default' => 'First Name',
                ],
                [
                    'name' => 'options[contact_form_last_name]',
                    'id' => 'contact_form_last_name',
                    'type' => 'text',
                    'label' => 'Last Name Label',
                    'default' => 'Last Name',
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
                    'default' => 'Phone',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button Label',
                    'default' => 'Call me back',
                ],
                [
                    'name' => 'list_your_property_title',
                    'type' => 'title',
                    'label' => 'List your property',
                ],
                [
                    'name' => 'options[list_your_property_subtitle]',
                    'id' => 'list_your_property_subtitle',
                    'type' => 'text',
                    'label' => 'Contact Sub title',
                    'default' => 'SELLING A PROPERTY?',
                ],
                [
                    'name' => 'options[list_your_property_title]',
                    'id' => 'list_your_property_title',
                    'type' => 'text',
                    'label' => 'Contact title',
                    'default' => 'We can help today',
                ],
                [
                    'name' => 'options[list_your_property_description]',
                    'id' => 'list_your_property_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Get the exposure you deserve and the price you are worth by utilizing out marketing ninjas and sales gurus!',

                ],
                [
                    'name' => 'options[list_your_property_btn]',
                    'id' => 'list_your_property_btn',
                    'type' => 'text',
                    'label' => 'Contact Button',
                    'default' => 'List a Property',
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
                    'name' => 'options[property_title]',
                    'id' => 'property_title',
                    'type' => 'text',
                    'label' => 'Description title',
                    'default' => 'Description',
                ],
                [
                    'name' => 'options[brochure_label]',
                    'id' => 'brochure_label',
                    'type' => 'text',
                    'label' => 'Brochure label',
                    'default' => 'Brochure',
                ],
            ],
        ],
        [
            'section_title' => 'Features Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[features_title]',
                    'id' => 'features_title',
                    'type' => 'text',
                    'label' => 'Features title',
                    'default' => 'Features',
                ],
            ],
        ],
        [
            'section_title' => 'Map Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[map_title]',
                    'id' => 'map_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Property Location',
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
                    'default' => 'Property Enquiry',
                ],
                [
                    'name' => 'options[enquiry_first_name]',
                    'id' => 'enquiry_first_name',
                    'type' => 'text',
                    'label' => ' First name label',
                    'default' => 'First Name',
                ],
                [
                    'name' => 'options[enquiry_last_name]',
                    'id' => 'enquiry_last_name',
                    'type' => 'text',
                    'label' => ' Last name label',
                    'default' => 'Last Name',
                ],
                [
                    'name' => 'options[enquiry_email]',
                    'id' => 'enquiry_email',
                    'type' => 'text',
                    'label' => ' Email label',
                    'default' => 'Email',
                ],
                [
                    'name' => 'options[enquiry_phone_number]',
                    'id' => 'enquiry_phone_number',
                    'type' => 'text',
                    'label' => ' Phone number label',
                    'default' => 'Phone Number',
                ],
                [
                    'name' => 'options[enquiry_message]',
                    'id' => 'enquiry_message',
                    'type' => 'text',
                    'label' => ' Message label',
                    'default' => 'Message',
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
            'section_title' => 'Contact Us Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[newsletter_message]',
                    'id' => 'newsletter_message',
                    'type' => 'text',
                    'label' => 'Newsletter Subscription Message',
                    'default' => 'Get early access to new properties.',
                ],
                [
                    'name' => 'options[newsletter_btn]',
                    'id' => 'newsletter_btn',
                    'type' => 'text',
                    'label' => 'Newsletter Button Text',
                    'default' => 'Sign Up',
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
                    'label' => 'Title',
                    'default' => 'Get in touch',
                ],
                [
                    'name' => 'options[contact_form_full_name]',
                    'id' => 'contact_form_full_name',
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
                    'label' => 'Form Button Text',
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
                    'name' => 'options[map_popup_img]',
                    'id' => 'map_popup_img',
                    'type' => 'file',
                    'label' => 'Map Popup Image',
                ],
                [
                    'name' => 'options[map_popup_desc]',
                    'id' => 'map_popup_desc',
                    'type' => 'text',
                    'label' => 'Map Popup Description',
                    'default' => 'Our Location',
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
                    'type' => 'normal-html-editor',
                    'label' => 'Title',
                    'default' => 'Our Team',
                ],
                [
                    'name' => 'options[about_content_1]',
                    'id' => 'about_content_1',
                    'type' => 'normal-html-editor',
                    'label' => 'Content 1',
                    'default' => '
                    <p>We are the best real estate agency around and an independent company established in 2020.  We provide services for rent and sale of high quality housing, we are engaged in investments, we assist in immigration and legal aspects, as well as in property management.</p><br/>
                    <p>We can say safely that real estate is a passion for us, and seeing the happiness on the faces of our customers who believe and trust our recommendations is our reward.</p>',
                ],
                [
                    'name' => 'options[about_team_image_1]',
                    'id' => 'about_team_image_1',
                    'type' => 'file',
                    'label' => 'Team Image 1',
                ],
                [
                    'name' => 'options[about_team_image_2]',
                    'id' => 'about_team_image_2',
                    'type' => 'file',
                    'label' => 'Team Image 2',
                ],
                [
                    'name' => 'options[about_content_2]',
                    'id' => 'about_content_2',
                    'type' => 'normal-html-editor',
                    'label' => 'Content 2',
                    'default' => '<p>Our real estate is exclusively modern, with carefully selected properties to guarantee you comfort, convenience and safety. Our main goal is to be attentive to the wishes of each client to build a strong long-term relationship with them! We not only sell housing, but also strive to help our clients find their own cosy place and increase the amount of capital!</p><br/>

                    <p>Our aim is to provide high quality properties suitable for both investment and personal living wit our dedicated and honest real estate consultants always available to support our customers. We want to be the first company that comes to your mind for quality, profitable real estate investment.</p><br/>
                    <p>Over the years many of our customers have evolved from clients to friends, and this is reflected in our reviews, and the fact they return time and time again.</p>',
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
                    'type' => 'normal-html-editor',
                    'label' => 'Title',
                    'default' => 'Get in touch today to find your dream property.',
                ],
                [
                    'name' => 'options[contact_form_btn]',
                    'id' => 'contact_form_btn',
                    'type' => 'text',
                    'label' => 'Button',
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
                    'name' => 'options[contact_form_beds]',
                    'id' => 'contact_form_beds',
                    'type' => 'text',
                    'label' => 'Bedrooms Label',
                    'default' => 'Bedrooms',
                ],
                [
                    'name' => 'options[contact_form_baths]',
                    'id' => 'contact_form_baths',
                    'type' => 'text',
                    'label' => 'Bathrooms Label',
                    'default' => 'Bathrooms',
                ],
                [
                    'name' => 'options[contact_form_property_sale_rent]',
                    'id' => 'contact_form_property_sale_rent',
                    'type' => 'text',
                    'label' => 'Sale/Rent Label',
                    'default' => 'Property for Sale or Rent?',
                ],
                [
                    'name' => 'options[contact_form_property_type]',
                    'id' => 'contact_form_property_type',
                    'type' => 'text',
                    'label' => 'Property Type Label',
                    'default' => 'Property Type',
                ],
                [
                    'name' => 'options[contact_form_location]',
                    'id' => 'contact_form_location',
                    'type' => 'text',
                    'label' => 'Location Label',
                    'default' => 'Location',
                ],
                [
                    'name' => 'options[contact_form_covered_area]',
                    'id' => 'contact_form_covered_area',
                    'type' => 'text',
                    'label' => 'Covered area Label',
                    'default' => 'Covered Area',
                ],
                [
                    'name' => 'options[contact_form_plot_size]',
                    'id' => 'contact_form_plot_size',
                    'type' => 'text',
                    'label' => 'Plot size Label',
                    'default' => 'Plot Size',
                ],
                [
                    'name' => 'options[contact_form_message]',
                    'id' => 'contact_form_message',
                    'type' => 'text',
                    'label' => 'Message Label',
                    'default' => 'Description / Notes',
                ],
                [
                    'name' => 'options[contact_form_agreement]',
                    'id' => 'contact_form_agreement',
                    'type' => 'simple-html-editor',
                    'label' => 'Agreement text',
                    'default' => '<p>I have read & understood the <a href="/privacy-policy" target="_blank">Privacy Policy</a></p>',
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
