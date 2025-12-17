<?php

declare(strict_types=1);

$options = [
    'QobrixExhibition' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('QobrixExhibition') . 'webroot/images/default/logo_left.webp'),
        'options' => [
            'logo_right' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('QobrixExhibition') . 'webroot/images/default/logo_right.webp'),
        ],
    ],
];
