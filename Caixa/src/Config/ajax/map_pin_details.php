<?php
declare(strict_types=1);
$options = [
    'Caixa' => [
        'sale_rent' => [
            'get',
            'sale_rent',
        ],
        'url' => ['getUrl'],
        'ref' => [
            'get',
            'ref',
        ],
        'bedrooms' => [
            'get',
            'bedrooms',
        ],
        'bathrooms' => [
            'get',
            'bathrooms',
        ],
        'internal_area_amount' => [
            'getField',
            'internal_area_amount',
        ],
        'surface' => [
            'get',
            'internal_area_amount',
        ],
        'agent' => function ($property) {
            $response = [
                'tel_mobile' => '',
                'tel_office' => '',
                'logo' => '',
                'name' => '',
                'id' => '',
            ];

            $agent_info = \App\Connector\Brand::getAgentInfo($property->get('agent'));
            if (empty($agent_info)) {
                return $response;
            }

            $response['tel_mobile'] = $agent_info->get('tel_mobile');
            $response['tel_office'] = $agent_info->get('tel_office');
            $response['logo'] = $agent_info->getPhotoUrl('logo');
            $response['name'] = $agent_info->get('name');
            $response['id'] = $property->get('agent');

            return $response;
        },
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
        'name' => [
            'get',
            'name',
        ],
        'price' => ['getWebsitePrice'],
        'raw_website_price' => ['getRawWebsitePrice'],
        'category' => [
            'get',
            'property_type',
        ],
        'property_subtype' => function ($property) {
            return \App\Utils\IntegrationsTealium::getPropertyCategory($property->get('property_subtype'));
        },
        'status' => [
            'get',
            'status',
        ],
        'publication_status' => [
            'getField',
            'status',
        ],
        'address' => [
            'getLocation' => [
                'get',
                'district',
            ],
        ],
        'floor_number' => [
            'get',
            'floor_number',
        ],
        'construction_stage' => [
            'get',
            'construction_stage',
        ],
        'energy_efficiency_certificate' => [
            'getField',
            'energy_efficiency_grade',
        ],
        'publication_date' => [
            'get',
            'website_listing_date',
        ],
        'pvp_sale' => function ($property) {
            return \Caixa\Utils\Caixa::getCaixaReducedPricePercentage($property);
        },
        'property_characteristics' => function ($property) {
            return \Caixa\Utils\Caixa::getPropertyCharacteristics($property);
        },
        'property_other_filters' => function ($property) {
            return \Caixa\Utils\Caixa::getPropertyOtherFilters($property);
        },
    ],
];
