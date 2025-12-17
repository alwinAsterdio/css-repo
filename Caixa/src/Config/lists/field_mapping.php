<?php

declare(strict_types=1);

$options = [
    'Caixa_lead_list' => [
        'list_selling_price_amount_min' => 'list_selling_price_from',
        'list_selling_price_amount_max' => 'list_selling_price_to',
        'list_rental_price_amount_min' => 'list_rental_price_from',
        'list_rental_price_amount_max' => 'list_rental_price_to',
        'internal_area_amount_min' => 'internal_area_from_amount',
        'internal_area_amount_max' => 'internal_area_to_amount',
        'bedrooms_min' => 'bedrooms_from',
        'bathrooms_min' => 'bathrooms_from',
        'new_build' => 'new_build',
        'furnished' => 'furnished',
        'elevator' => 'elevator',
        'air_condition' => 'air_condition',
        'parking_min' => 'parking_from',
        'common_swimming_pool' => 'common_swimming_pool',
        'private_swimming_pool' => 'private_swimming_pool',
        'heating' => 'heating',
        'garden_area_amount_min' => 'custom_garden',
        'custom_balcony' => 'custom_balcony',
        'verandas' => 'custom_verandas',
        'custom_bank_owned' => 'custom_bank_owned',
        'video_link' => 'video_link',
        'heating_type_not_empty' => 'custom_heating',
        'custom_discounted' => 'custom_discounted',
        'post_code' => 'post_codes',
    ],
    'Caixa_sort_list' => [
        'caixa_relevance_for_rent' => 'caixa_relevance_for_rent',
        'caixa_relevance_for_sale' => 'caixa_relevance_for_sale',
        '-website_listing_date' => 'recently_listed',
        'price_desc' => 'price_high',
        'price_asc' => 'price_low',
        '-price_per_square' => 'price_per_square_high',
        'price_per_square' => 'price_per_square_low',
        'internal_area_amount' => 'internal_high',
        '-internal_area_amount' => 'internal_low',
    ],
];
