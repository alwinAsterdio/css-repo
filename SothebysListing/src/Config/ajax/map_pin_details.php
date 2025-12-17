<?php
declare(strict_types=1);
$options = [
    'SothebysListing' => [
        'sale_rent' => [
            'get',
            'sale_rent',
        ],
        'sale_rent_display' => [
            'getField',
            'sale_rent',
        ],
        'property_type' => [
            'getField',
            'property_type',
        ],
        'url' => ['getUrl'],
        'ref' => [
            'get',
            'ref',
        ],
        'id' => [
            'get',
            'id',
        ],
        'image' => [
            'getPhotoUrl',
            'featured_photo',
            'medium',
            true,
        ],
        'title' => [
            'get',
            'name',
        ],
        'address' => [
            'getLocation' => [
                'get',
                'district',
            ],
        ],
    ]
];
