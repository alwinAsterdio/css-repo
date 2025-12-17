<?php

declare(strict_types=1);

$options = [
    'VipPortal' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('VipPortal') . 'webroot/images/default/login_logo.png'),
        'options' => [
            'style_primary_color' => '#067BC2',
            'style_secondary_color' => '#FFFFFF',
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('VipPortal') . 'webroot/images/default/favicon.ico'),
            'logo_width' => '500',
            'background_image_for_login_and_password' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('VipPortal') . 'webroot/images/default/login_poster.webp'),
        ],
    ],
];
