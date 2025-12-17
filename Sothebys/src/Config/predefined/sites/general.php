<?php

declare(strict_types=1);

$options = [
    'Mansion' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/menu-logo.webp'),
        'options' => [
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/favicon.ico'),
        ],
    ],
    'Sothebys' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/menu-logo.webp'),
        'options' => [
            'footer_logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/footer-logo.webp'),
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
