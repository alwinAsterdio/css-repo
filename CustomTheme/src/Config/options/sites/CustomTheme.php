<?php
declare(strict_types=1);

$options = [
    'site_details' => [
        [
            'section_title' => 'Website Name',
            'section_description' => 'Provide a new name for your website',
            'fields' => [
                [
                    'name' => 'site_title',
                    'type' => 'text',
                    'label' => 'Name of Website',
                    'required' => true,
                ],
                [
                    'name' => 'theme',
                    'type' => 'hidden',
                    'label' => 'Theme',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Details',
            'section_description' => 'The information users will use to contact you',
            'fields' => [
                [
                    'name' => 'email',
                    'type' => 'text',
                    'label' => 'Email',
                    'required' => true,
                ],
                [
                    'name' => 'phone',
                    'type' => 'text',
                    'label' => 'Phone',
                    'required' => true,
                ],
                [
                    'name' => 'options[whatsapp]',
                    'id' => 'whatsapp',
                    'type' => 'text',
                    'label' => 'WhatsApp',
                ],
                [
                    'name' => 'address',
                    'type' => 'text',
                    'label' => 'Address',
                ],
            ],
        ],
        [
            'section_title' => 'Social Media',
            'section_description' => 'The information users will use to contact you',
            'fields' => [
                [
                    'name' => 'options[social_media_facebook]',
                    'id' => 'social_media_facebook',
                    'type' => 'text',
                    'label' => 'Facebook',
                ],
                [
                    'name' => 'options[social_media_twitter]',
                    'id' => 'social_media_twitter',
                    'type' => 'text',
                    'label' => 'Twitter',
                ],
                [
                    'name' => 'options[social_media_linkedin]',
                    'id' => 'social_media_linkedin',
                    'type' => 'text',
                    'label' => 'LinkedIn',
                ],
                [
                    'name' => 'options[social_media_youtube]',
                    'id' => 'social_media_youtube',
                    'type' => 'text',
                    'label' => 'Youtube',
                ],
                [
                    'name' => 'options[social_media_tiktok]',
                    'id' => 'social_media_tiktok',
                    'type' => 'text',
                    'label' => 'TikTok',
                ],
                [
                    'name' => 'options[social_media_instagram]',
                    'id' => 'social_media_instagram',
                    'type' => 'text',
                    'label' => 'Instagram',
                ],
            ],
        ],
    ],
    'appearance' => [
        [
            'section_title' => 'Appearance',
            'section_description' => 'Style & personalize your site',
            'fields' => [
                [
                    'name' => 'options[style_primary_color]',
                    'id' => 'style_primary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Primary Color',
                    'default' => '#FF4D00',
                ],
                [
                    'name' => 'options[style_secondary_color]',
                    'id' => 'style_secondary_color',
                    'type' => 'color-picker',
                    'label' => 'Site Secondary Color',
                    'default' => '#FFFFFF',
                ],
                [
                    'name' => 'logo',
                    'type' => 'file',
                    'label' => 'Menu logo',
                ],
                [
                    'name' => 'options[favicon]',
                    'id' => 'favicon',
                    'type' => 'file',
                    'label' => 'Favicon',
                ],
            ],
        ],
    ],
    'integrations' => [
        [
            'section_title' => 'Google Analytics',
            'section_description' => 'If the GDPR integration is enabled the system will load this integration after the user accepts the 3rd party cookies else it will load it during page load.',
            'fields' => [
                [
                    'name' => 'options[google_analytics_enabled]',
                    'id' => 'google_analytics_enabled',
                    'type' => 'checkbox',
                    'label' => 'Google Analytics 4',
                ],
                [
                    'name' => 'options[google_analytics_id]',
                    'id' => 'google_analytics_id',
                    'type' => 'text',
                    'label' => 'MEASUREMENT ID',
                    'placeholder' => 'G-##########',
                ],
            ],
        ],
        [
            'section_title' => 'Google Tag Manager',
            'section_description' => 'If the GDPR integration is enabled the system will load this integration after the user accepts the 3rd party cookies else it will load it during page load.',
            'fields' => [
                [
                    'name' => 'options[google_tag_manager_enabled]',
                    'id' => 'google_tag_manager_enabled',
                    'type' => 'checkbox',
                    'label' => 'Google Tag Manager',
                ],
                [
                    'name' => 'options[google_tag_manager_id]',
                    'id' => 'google_tag_manager_id',
                    'type' => 'text',
                    'label' => 'Google Tag Manager ID',
                    'placeholder' => 'GTM-#######',
                ],
            ],
        ],
        [
            'section_title' => 'SEO',
            'section_description' => 'Search Engine Optimization settings',
            'fields' => [
                [
                    'name' => 'options[robots_txt_enabled]',
                    'id' => 'robots_txt_enabled',
                    'type' => 'checkbox',
                    'label' => 'Robots.txt',
                ],
                [
                    'type' => 'title',
                    'label' => 'Robots.txt Content',
                    'description' => '',
                ],
                [
                    'name' => 'options[robots_txt]',
                    'id' => 'robots_txt',
                    'type' => 'textarea',
                    'group_width' => 'full',
                    'label' => 'Robots.txt Content',
                    'default' => "User-agent: *\nDisallow: /admin/\nDisallow: /files/\nSitemap: ",
                    'description' => 'Enter the content for your robots.txt file. This will be served at /robots.txt',
                ],
            ],
        ],
    ],
    'domain' => [
        [
            'section_title' => 'Domain & Test URL',
            'section_description' => 'Finalize your website\'s domain settings',
            'fields' => [
                [
                    'name' => 'host',
                    'type' => 'text',
                    'label' => 'Primary Domain',
                ],
                [
                    'name' => 'alias_host',
                    'type' => 'text',
                    'label' => 'Alias Domain',
                ],
            ],
        ],
        [
            'section_title' => 'Domain & Test URL',
            'section_description' => 'Finalize your website\'s domain settings',
            'columns' => 1,
            'fields' => [
                [
                    'name' => 'dummy',
                    'type' => 'content',
                    'class' => 'btn btn-pill btn-primary btn-validate-domain',
                    'description' => 'If you purchases a domain from a third-party provider (like GoDaddy, HostGator or 1&1) and want to keep it registered with them, you can connect it to your site by following a setup process called DNS Connect or domain mapping. <b>Please point your `@` and `www` records to the Qoetix IP address: {server_ip}.</b> Once you have done this, your domain should take some time propagate. You can check if your domain is pointing to the correct URL below:',
                    'label' => 'Validate your Domain',
                ],
            ],
        ],
    ],
];
