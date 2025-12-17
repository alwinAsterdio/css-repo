<?php
declare(strict_types=1);

// This file will be used to define any custom sorting options for specific themes.
$options = [
    'Caixa_general' => [
        'caixa_relevance_for_sale' => [
            '-(list_selling_price_amount >= 150000 and list_selling_price_amount <= 600000 ? list_selling_price_amount : 0)',
            '-website_listing_date',
        ],
        'caixa_relevance_for_rent' => [
            '-(list_rental_price_amount >= 400 and list_rental_price_amount <= 2000 ? list_rental_price_amount : 0)',
            '-website_listing_date',
        ],
    ],
];
