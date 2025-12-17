<?php

declare(strict_types=1);

$options = [
    'SothebysListing' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/menu-logo.webp'),
        'options' => [
            'footer_logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/footer-logo.webp'),
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') .  'webroot/images/default/favicon.ico'),
            'map_marker' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('SothebysListing') . 'webroot/images/default/map-pin.webp'),
            'map_marker_active' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('SothebysListing') . 'webroot/images/default/map-pin-active.webp'),
            'map_marker_width' => '40',
            'map_marker_height' => '40',
        ],
    ],
];
