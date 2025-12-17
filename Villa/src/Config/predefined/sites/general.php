<?php

declare(strict_types=1);

$options = [
    'Villa' => [
        'logo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-logo.webp'),
        'options' => [
            'favicon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-favicon.webp'),
            'google_translate_enabled' => 'on',
            'google_lang_default_lang' => 'en',
            'google_lang_shape' => 'rectangle',
            'google_lang_choices' => [
                'ar' => 'on',
                'de' => 'off',
                'el' => 'off',
                'en' => 'on',
                'es' => 'on',
                'fr' => 'on',
                'ru' => 'on',
                'tr' => 'off',
                'zh-CN' => 'on',
            ],
        ],
    ],
];
