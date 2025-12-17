<?php

declare(strict_types=1);

$options = [
    'Neaimoveis' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Logo.webp'),
        'options' => [
            'logo_light' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Logo_Light.webp'),
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/favicon.ico'),
        ],
    ],
];
