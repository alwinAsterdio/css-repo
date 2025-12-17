<?php

declare(strict_types=1);

$options = [
    'vip_admin/property' => [
        [
            'section_title' => 'Media Options',
            'section_description' => 'Options for displaying media',
            'fields' => [
                [
                    'name' => 'options[display_property_media]',
                    'id' => 'display_property_media',
                    'type' => 'radio',
                    'label' => 'Display media on property page:',
                    'options' => [
                        'on' => 'On',
                        'off' => 'Off',
                    ],
                ],
                [
                    'name' => 'options[display_property_media_options]',
                    'id' => 'display_property_media_options',
                    'type' => 'multi-checkbox',
                    'group_width' => 'full',
                    'label' => 'Select which media to display',
                    'options' => \App\Connector\Property::publicMediaCategory(),
                ],
                [
                    'name' => 'options[placeholder_documents_image]',
                    'id' => 'placeholder_documents_image',
                    'type' => 'file',
                    'label' => 'Placeholder for Documents',
                ],
            ],
        ],
    ],
    'vip_admin/properties' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'All Properties',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'Browse & review all properties',
                ],
            ],
        ],
    ],
    'vip_admin/recommended-properties' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Recommended Properties',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'A curated selection of properties for you',
                ],
            ],
        ],
    ],
    'vip_admin/favourite-properties' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'My Favourite Properties',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'Favourite properties & groups',
                ],
            ],
        ],
    ],
    'vip_admin/matching-properties' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'My Matching Properties',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'Properties that match your interests',
                ],
            ],
        ],
    ],
    'vip_admin/get-in-touch' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Say Hello',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'Speak to your agent',
                ],
            ],
        ],
        [
            'section_title' => 'Contact Details Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[contact_details_title]',
                    'id' => 'contact_details_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Details',
                ],
                [
                    'name' => 'options[contact_details_description]',
                    'id' => 'contact_details_description',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'Basic information about the contact ',
                ],
            ],
        ],
    ],
    'vip_admin/my-profile' => [
        [
            'section_title' => 'Primary Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[primary_title]',
                    'id' => 'primary_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Profile',
                ],
                [
                    'name' => 'options[primary_details]',
                    'id' => 'primary_details',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'View or edit your profile',
                ],
            ],
        ],
        [
            'section_title' => 'Personal Details Section',
            'section_description' => '',
            'fields' => [
                [
                    'name' => 'options[personal_details_title]',
                    'id' => 'personal_details_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'Personal Details',
                ],
                [
                    'name' => 'options[personal_details_description]',
                    'id' => 'personal_details_description',
                    'type' => 'text',
                    'label' => 'Details',
                    'default' => 'User Personal',
                ],
            ],
        ],
    ],
    'vip_admin/login' => [
        [
            'section_title' => 'Login Options',
            'section_description' => 'Options for Login page',
            'fields' => [
                [
                    'name' => 'options[login_title]',
                    'id' => 'login_title',
                    'type' => 'text',
                    'label' => 'Login Title',
                    'default' => 'Hello, please sign into your account',
                ],
            ],
        ],
    ],
    'vip_admin/reset-password' => [
        [
            'section_title' => 'Reset Password Options',
            'section_description' => 'Options for Password page',
            'fields' => [
                [
                    'name' => 'options[forgot_password_title]',
                    'id' => 'forgot_password_title',
                    'type' => 'text',
                    'label' => 'Forgot Password Title',
                    'default' => 'Reset your password',
                ],
            ],
        ],
    ],
    'vip_admin/password' => [
        [
            'section_title' => 'Password Options',
            'section_description' => 'Options for Password page',
            'fields' => [
                [
                    'name' => 'options[set_new_password_title]',
                    'id' => 'set_new_password_title',
                    'type' => 'text',
                    'label' => 'Set New Password Title',
                    'default' => 'Set New Password',
                ],
            ],
        ],
    ],
];
