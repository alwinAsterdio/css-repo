<?php

declare(strict_types=1);

$options = [
    'Penthouse' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/penthouse-menu-logo.webp'),
        'options' => [
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
