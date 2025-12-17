<?php
declare(strict_types=1);

$options = [
    [
        [
            'name' => 'sale_rent',
            'label' => 'Buy/Rent',
            'type' => 'select',
            'options' => [
                'for_sale' => 'Buy',
                'for_rent' => 'Rent',
            ],
            'default' => 'for_sale',
        ],
        [
            'name' => 'type',
            'label' => 'Property Type',
            'type' => 'property-type',
            'placeholder' => 'Any',
        ],
        [
            'name' => 'internal_area_amount',
            'label' => 'Internal Area',
            'type' => 'min-max',
            'placeholder' => 'Any',
            'min_label' => 'From',
            'max_label' => 'To',
            'unit' => 'area',
            'options' => 'area_amount',
        ],
        [
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select',
            'options' => \App\Connector\Property::getFieldList('status'),
            'placeholder' => 'Any',
            'include_placeholder_as_value' => true,
        ],
        [
            'name' => 'list_selling_price_amount',
            'label' => 'Price',
            'type' => 'min-max',
            'placeholder' => 'Any',
            'prefix' => '€',
            'visible' => [
                'sale_rent' => [
                    'for_sale',
                ],
            ],
            'unit' => 'currency',
        ],
        [
            'name' => 'list_rental_price_amount',
            'label' => 'Price',
            'type' => 'min-max',
            'placeholder' => 'Any',
            'prefix' => '€',
            'visible' => [
                'sale_rent' => [
                    'for_rent',
                ],
            ],
            'unit' => 'currency',
        ],
        [
            'name' => 'custom_parking_availability',
            'label' => 'Parking Availability',
            'type' => 'select',
            'options' => [
                '0' => 'No',
                '1' => 'Yes',
            ],
            'placeholder' => 'Any',
            'include_placeholder_as_value' => true,
        ],
        [
            'name' => 'custom_is_parking_free',
            'include_placeholder_as_value' => true,
            'label' => 'Is Parking Free?',
            'type' => 'select',
            'options' => [
                '0' => 'No',
                '1' => 'Yes',
            ],
            'placeholder' => 'Any',
        ],
        [
            'name' => 'custom_competitors_10min_drive_radius',
            'label' => 'Competitors 10min drive radius',
            'type' => 'min-max-text',
            'placeholder' => 'Any',
        ],
        [
            'name' => 'custom_population_10min_drive_radius',
            'label' => 'Population 10min Drive Radius',
            'type' => 'min-max-text',
            'placeholder' => 'Any',
        ],
        [
            'name' => 'search',
            'label' => 'SEARCH',
            'type' => 'button',
        ],
    ],
];
