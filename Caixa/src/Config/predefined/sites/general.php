<?php

declare(strict_types=1);

$options = [
    'Caixa' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Caixa') . 'webroot/images/default/menu-logo.webp'),
        'options' => [
            'default_property_featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Caixa') . 'webroot/images/default/property_featured_photo.webp'),
            'logo_light' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Caixa') . 'webroot/images/default/menu-logo-light.webp'),
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Caixa') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
