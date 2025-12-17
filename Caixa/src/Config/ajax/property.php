<?php
declare(strict_types=1);

$options = [
    'Caixa' => [
        'description' => [
            'get',
            'description',
        ],
        'sale_rent_raw' => [
            'get',
            'sale_rent',
        ],
        'sale_rent' => [
            'getCustomSaleRent',
        ],
        'sale_rent_display' => [
            'getField',
            'sale_rent',
        ],
        'property_type' => [
            'getField',
            'property_type',
        ],
        'property_type_raw' => [
            'get',
            'property_type',
        ],
        'url' => ['getUrl'],
        'website_url' => function ($property) {
            $website_url = $property->get('website_url');
            if (empty($website_url)) {
                return '';
            }

            $siteId = \App\Tenancy\TenancyManagement::instance()->getTenancy()->getSite()->siteId();
            $site = \App\Utils\Sites::get((int)$siteId);
            $site_data_options = json_decode($site->get('options'), true);

            return \Caixa\Utils\CaixaFunctions::customWebsiteUrlParser($property, $site_data_options);
        },
        'ref' => [
            'get',
            'ref',
        ],
        'original_ref' => [
            'get',
            'original_ref',
        ],
        'id' => [
            'get',
            'id',
        ],
        'featured_photo' => [
            'getPhotoUrl',
            'featured_photo',
            'medium',
            true,
        ],
        'name' => [
            'get',
            'name',
        ],
        'website_price' => ['getWebsitePrice'],
        'internal_area_amount' => [
            'getField',
            'internal_area_amount',
        ],
        'bedrooms' => [
            'getField',
            'bedrooms',
        ],
        'bathrooms' => [
            'getField',
            'bathrooms',
        ],
        'floor_number' => [
            'getField',
            'floor_number',
        ],
        'address' => ['getSimpleAddress'],
        'agent' => function ($property) {
            $response = [
                'tel_mobile' => '',
                'tel_office' => '',
                'logo' => '',
                'name' => '',
            ];
            $response['id'] = $property->get('agent');

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
        'coordinates' => [
            'get',
            'coordinates',
        ],
        'list_selling_price_amount' => [
            'getField',
            'list_selling_price_amount',
        ],
        'list_rental_price_amount' => [
            'getField',
            'list_rental_price_amount',
        ],
        'geocode_type' => [
            'get',
            'geocode_type',
        ],
        'price_qualifier' => [
            'get',
            'price_qualifier',
        ],
    ],
];
