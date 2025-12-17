<?php

declare(strict_types=1);

$options = [
    'Mansion' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/menu-logo.webp'),
        'options' => [
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
