<?php

declare(strict_types=1);

$options = [
    'home' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_description]',
                    'id' => 'primary_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
                ],
                [
                    'name' => 'options[primary_btn_1_text]',
                    'id' => 'primary_btn_1_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Μιλήστε μαζί μας',
                ],
                [
                    'name' => 'options[primary_btn_2_text]',
                    'id' => 'primary_btn_2_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Καλύψεις',
                ],
                [
                    'name' => 'options[primary_bg_image]',
                    'id' => 'primary_bg_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[primary_bottom_logo]',
                    'id' => 'primary_bottom_logo',
                    'type' => 'file',
                    'label' => 'Bottom Logo',
                ],
            ],
        ],
        [
            'section_title' => 'Services Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[services_tab_1_text]',
                    'id' => 'services_tab_1_text',
                    'type' => 'text',
                    'label' => 'Tab 1',
                    'default' => 'Ιδιώτες',
                ],
                [
                    'name' => 'options[services_tab_1_title]',
                    'id' => 'services_tab_1_title',
                    'type' => 'text',
                    'label' => 'Tab 1 Title',
                    'default' => 'Οι Καλύψεις μας',
                ],
                [
                    'name' => 'options[services_tab_1_desc]',
                    'id' => 'services_tab_1_desc',
                    'type' => 'normal-html-editor',
                    'label' => 'Tab 1 Description',
                    'default' => 'Οι Καλύψεις μας',
                ],
                [
                    'name' => 'options[services_tab_1_btn]',
                    'id' => 'services_tab_1_btn',
                    'type' => 'text',
                    'label' => 'Tab 1 Button',
                    'default' => 'Πάρε Προσφορά',
                ],
                [
                    'name' => 'options[services_tab_2_text]',
                    'id' => 'services_tab_2_text',
                    'type' => 'text',
                    'label' => 'Tab 2',
                    'default' => 'Επιχειρήσεις',
                ],
                [
                    'name' => 'options[services_tab_2_title]',
                    'id' => 'services_tab_2_title',
                    'type' => 'text',
                    'label' => 'Tab 2 Title',
                    'default' => 'Οι Καλύψεις μας',
                ],
                [
                    'name' => 'options[services_tab_2_desc]',
                    'id' => 'services_tab_2_desc',
                    'type' => 'normal-html-editor',
                    'label' => 'Tab 2 Description',
                    'default' => 'Οι Καλύψεις μας',
                ],
                [
                    'name' => 'options[services_tab_2_btn]',
                    'id' => 'services_tab_2_btn',
                    'type' => 'normal-html-editor',
                    'label' => 'Tab 2 Button',
                    'default' => 'Πάρε Προσφορά',
                ],
            ],
        ],
        [
            'section_title' => 'Offers Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[offers_title]',
                    'id' => 'offers_title',
                    'type' => 'normal-html-editor',
                    'label' => 'Section Title',
                    'default' => 'Επιλέξτε το δικό σας επαγγελματικό πακέτο και εξοικονομήστε μέχρι 10% στις προσωπικές καλύψεις!',
                ],
                [
                    'name' => 'options[offers_description]',
                    'id' => 'offers_description',
                    'type' => 'normal-html-editor',
                    'label' => 'Section Description',
                    'default' => 'Προσφέρουμε τα πιο ολοκληρωμένα ασφαλιστικά προγράμματα για κάθε σας ανάγκη και στην καλύτερη τιμή!',
                ],
                [
                    'name' => 'options[offers_btn_text]',
                    'id' => 'offers_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Μάθε Περισσότερα…',
                ],
                [
                    'name' => 'options[offers_image]',
                    'id' => 'offers_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],

            ],
        ],
        [
            'section_title' => 'Blogs Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[blogs_subtitle]',
                    'id' => 'blogs_subtitle',
                    'type' => 'text',
                    'label' => 'Blogs Sub-title',
                    'default' => 'Ασφαλιστικές ιστορίες και άλλα ενδιαφέροντα θέματα',
                ],
                [
                    'name' => 'options[blogs_title]',
                    'id' => 'blogs_title',
                    'type' => 'text',
                    'label' => 'Blogs Title',
                    'default' => 'Νέα',
                ],
                [
                    'name' => 'options[blogs_description]',
                    'id' => 'blogs_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Blogs Description',
                    'default' => 'Διαβάστε ενδιαφέρουσες και χρήσιμες πληροφορίες σχετικά με τις ασφαλιστικές σας ανάγκες καθώς αυτές αναπτύσσονται στο τρέχον οικονομικό και κοινωνικό περιβάλλον.',
                ],
                [
                    'name' => 'options[blogs_btn_text]',
                    'id' => 'blogs_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Διαβάστε Περισσότερα',
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
                    'label' => 'About Us Title',
                    'default' => 'Ποιοι Είμαστε',
                ],
                [
                    'name' => 'options[about_us_description]',
                    'id' => 'about_us_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Description',

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
                    'name' => 'options[contact_us_subtitle]',
                    'id' => 'contact_us_subtitle',
                    'type' => 'text',
                    'label' => 'Sub Title',
                    'default' => 'Είμαστε έτοιμοι να σας ακούσουμε.',
                ],
                [
                    'name' => 'options[contact_us_title]',
                    'id' => 'contact_us_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Μιλήστε μαζί μας',
                ],
                [
                    'name' => 'options[contact_us_btn_text]',
                    'id' => 'contact_us_btn_text',
                    'type' => 'text',
                    'label' => 'Button Text',
                    'default' => 'Αποστολή',
                ],
            ],
        ],
        [
            'section_title' => 'Partners Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[partners_section_title]',
                    'id' => 'partners_section_title',
                    'type' => 'text',
                    'group_width' => 'full',
                    'label' => 'Partners Title',
                    'default' => 'Σε συνεργασία με',
                ],
                [
                    'name' => 'options[partner_1_img]',
                    'id' => 'partner_1_img',
                    'type' => 'file',
                    'label' => 'Partner 1 Image',
                ],
                [
                    'name' => 'options[partner_1_phone]',
                    'id' => 'partner_1_phone',
                    'type' => 'text',
                    'label' => 'Partner 1 Phone',
                    'default' => 'Phone',

                ],
                [
                    'name' => 'options[partner_1_email]',
                    'id' => 'partner_1_email',
                    'type' => 'text',
                    'label' => 'Partner 1 Email',
                    'default' => 'Email',

                ],
                [
                    'name' => 'options[partner_1_website]',
                    'id' => 'partner_1_website',
                    'type' => 'text',
                    'label' => 'Partner 1 Website',
                    'default' => 'Website',

                ],
            ],
        ],
        [
            'section_title' => 'Partners 2 Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[partner_2_img]',
                    'id' => 'partner_2_img',
                    'type' => 'file',
                    'label' => 'Partner 2 Image',
                ],
                [
                    'name' => 'options[partner_2_phone]',
                    'id' => 'partner_2_phone',
                    'type' => 'text',
                    'label' => 'Partner 2 Phone',
                    'default' => 'Phone',

                ],
                [
                    'name' => 'options[partner_2_email]',
                    'id' => 'partner_2_email',
                    'type' => 'text',
                    'label' => 'Partner 2 Email',
                    'default' => 'Email',

                ],
                [
                    'name' => 'options[partner_2_website]',
                    'id' => 'partner_2_website',
                    'type' => 'text',
                    'label' => 'Partner 2 Website',
                    'default' => 'Website',

                ],
            ],
        ],
        [
            'section_title' => 'Partners 3 Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[partner_3_img]',
                    'id' => 'partner_3_img',
                    'type' => 'file',
                    'label' => 'Partner 3 Image',
                ],
                [
                    'name' => 'options[partner_3_phone]',
                    'id' => 'partner_3_phone',
                    'type' => 'text',
                    'label' => 'Partner 3 Phone',
                    'default' => 'Phone',

                ],
                [
                    'name' => 'options[partner_3_email]',
                    'id' => 'partner_3_email',
                    'type' => 'text',
                    'label' => 'Partner 3 Email',
                    'default' => 'Email',

                ],
                [
                    'name' => 'options[partner_3_website]',
                    'id' => 'partner_3_website',
                    'type' => 'text',
                    'label' => 'Partner 3 Website',
                    'default' => 'Email Website',

                ],
            ],
        ],
        [
            'section_title' => 'Map Settings',
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
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Map Popup Description',
                    'default' => 'Description',
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
                    'name' => 'options[blogs_primary_subtitle]',
                    'id' => 'blogs_primary_subtitle',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Sub Title',
                    'default' => 'Primary Section Sub Title',
                ],
                [
                    'name' => 'options[blogs_primary_description]',
                    'id' => 'blogs_primary_description',
                    'type' => 'simple-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
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
    'blog' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[blog_primary_description]',
                    'id' => 'blog_primary_description',
                    'type' => 'advance-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
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
    'products_personal' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[products_primary_subtitle]',
                    'id' => 'products_primary_subtitle',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Sub Title',
                    'default' => 'Primary Section Sub Title',
                ],
                [
                    'name' => 'options[products_primary_description]',
                    'id' => 'products_primary_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
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
    'products_commercial' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[products_primary_subtitle]',
                    'id' => 'products_primary_subtitle',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Sub Title',
                    'default' => 'Primary Section Sub Title',
                ],
                [
                    'name' => 'options[products_primary_description]',
                    'id' => 'products_primary_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
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
    'product_personal' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[product_primary_sub_title]',
                    'id' => 'product_primary_sub_title',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Sub-Title',
                    'default' => 'Primary Section Sub-Title',
                ],
                [
                    'name' => 'options[product_primary_description]',
                    'id' => 'product_primary_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
                ],
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[product_feature_photo]',
                    'id' => 'product_feature_photo',
                    'type' => 'file',
                    'label' => 'Feature Image',
                ],
            ],
        ],
    ],
    'product_commercial' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[product_primary_sub_title]',
                    'id' => 'product_primary_sub_title',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Sub-Title',
                    'default' => 'Primary Section Sub-Title',
                ],
                [
                    'name' => 'options[product_primary_description]',
                    'id' => 'product_primary_description',
                    'type' => 'normal-html-editor',
                    'group_width' => 'full',
                    'label' => 'Description',
                    'default' => 'Primary Section Description',
                ],
                [
                    'name' => 'options[hero_image]',
                    'id' => 'hero_image',
                    'type' => 'file',
                    'label' => 'Background Image',
                ],
                [
                    'name' => 'options[product_feature_photo]',
                    'id' => 'product_feature_photo',
                    'type' => 'file',
                    'label' => 'Feature Image',
                ],
            ],
        ],
    ],
    'privacy_policy' => [
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
            'section_title' => 'Privacy Policy',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[privacy_content]',
                    'id' => 'privacy_content',
                    'group_width' => 'full',
                    'type' => 'normal-html-editor',
                    'label' => 'Privacy Content',
                    'default' => 'Privacy Content',
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
