<?php

declare(strict_types=1);

$options = [
    'Chateau' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Chateau') . 'webroot/images/default/chateau-logo.webp'),
        'options' => [
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Chateau') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
