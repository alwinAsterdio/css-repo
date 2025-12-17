<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Property',
        'page_slug' => 'property',
        'page_type' => 'vip_admin/property',
        'options' => [
            'display_property_media' => 'off',
            'display_property_media_options' => array_fill_keys(array_keys(\App\Connector\Property::publicMediaCategory()), 'on'),
            'placeholder_documents_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('VipPortal') . 'webroot/images/default/PlaceHolderDocument.webp'),
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_slug' => '/',
        'is_homepage' => true,
        'page_type' => 'vip_admin/properties',
    ],
    // [
    //     'page_title' => 'Recommended Properties',
    //     'page_slug' => 'recommended-properties',
    //     'page_type' => 'vip_admin/recommended-properties',
    // ],
    // [
    //     'page_title' => 'Favourites',
    //     'page_slug' => 'favourite-properties',
    //     'page_type' => 'vip_admin/favourite-properties',
    // ],
    // [
    //     'page_title' => 'Matching Properties',
    //     'page_slug' => 'matching-properties',
    //     'page_type' => 'vip_admin/matching-properties',
    // ],
    [
        'page_title' => 'Login',
        'page_slug' => 'login',
        'page_type' => 'vip_admin/login',
    ],
    [
        'page_title' => 'Reset Password',
        'page_slug' => 'reset-password',
        'page_type' => 'vip_admin/reset-password',
    ],
    [
        'page_title' => 'Password',
        'page_slug' => 'password',
        'page_type' => 'vip_admin/password',
    ],
    [
        'page_title' => 'Get In Touch',
        'page_slug' => 'get-in-touch',
        'page_type' => 'vip_admin/get-in-touch',
    ],
    [
        'page_title' => 'My profile',
        'page_slug' => 'my-profile',
        'page_type' => 'vip_admin/my-profile',
    ],
];
