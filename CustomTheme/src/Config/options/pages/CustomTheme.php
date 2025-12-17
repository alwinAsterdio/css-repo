<?php

declare(strict_types=1);

$options = [
    'custom_template' => [
        [
            'section_title' => 'Page Content',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[template]',
                    'id' => 'template',
                    'type' => 'select-ajax',
                    'label' => 'Layout',
                ],
                [
                    'name' => 'options[affiliate_code]',
                    'id' => 'affiliate_code',
                    'type' => 'text',
                    'label' => 'Affiliate Code',
                    'default' => '',
                    'description' => 'You can use {{AffiliateCode}} in the template',
                ],
                [
                    'name' => 'options[header_logo_link]',
                    'id' => 'header_logo_link',
                    'type' => 'text',
                    'label' => 'Header Logo Link',
                    'default' => '',
                    'description' => 'You can use {{HeaderLogoLink}} in the template',
                ],
                [
                    'name' => 'options[demo_account_link]',
                    'id' => 'demo_account_link',
                    'type' => 'text',
                    'label' => 'Demo Account Link',
                    'default' => '',
                    'description' => 'You can use {{DemoAccountLink}} in the template',
                ],
                [
                    'name' => 'options[real_account_link]',
                    'id' => 'real_account_link',
                    'type' => 'text',
                    'label' => 'Real Account Link',
                    'default' => '',
                    'description' => 'You can use {{RealAccountLink}} in the template',
                ],
                [
                    'name' => 'options[app_downloads_link]',
                    'id' => 'app_downloads_link',
                    'type' => 'text',
                    'label' => 'App Downloads Link',
                    'default' => '',
                    'description' => 'You can use {{AppDownloadsLink}} in the template',
                ],
            ],
        ],
    ],
];
