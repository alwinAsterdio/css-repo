<?php
declare(strict_types=1);

namespace Caixa\Utils;

/**
 * This class will be used to connect with qobrix api.
 */
class Caixa extends \App\QobrixModel\Property
{
    /**
     * Get property characteristics.
     *
     * @param \App\QobrixModel\Property $property The property.
     * @return string
     */
    public static function getPropertyCharacteristics($property): string
    {
        $prod_characteristics = [];
        $features = [
            'aire acondicionado' => $property->get('air_condition'),
            'aparcamiento' => $property->get('parking') > 0,
            'piscina' => $property->get('common_swimming_pool') || $property->get('private_swimming_pool'),
            'calefacción' => !empty($property->get('heating_type')),
            'jardín' => $property->get('garden_area_amount') > 0,
            'balcón' => $property->get('custom_balcony'),
        ];

        foreach ($features as $feature => $condition) {
            if ($condition) {
                $prod_characteristics[] = $feature;
            }
        }

        return implode(', ', $prod_characteristics);
    }

    /**
     * Get property other filters.
     *
     * @param \App\QobrixModel\Property $property The property.
     * @return string
     */
    public static function getPropertyOtherFilters($property): string
    {
        $prod_otherfilters = [];
        $otherfilters = [
            'de bancos' => $property->get('custom_bank_owned'),
            'rebajados' => $property->getWebsitePriceDifference() < 0,
        ];

        foreach ($otherfilters as $filter => $condition) {
            if ($condition) {
                $prod_otherfilters[] = $filter;
            }
        }

        return implode(', ', $prod_otherfilters);
    }

    /**
     * Get caixa sale rent value.
     *
     * @param string $string The string.
     * @return string
     */
    public static function getCaixaSaleRentValue($string): string
    {
        $return = [
            'for_sale' => 'compra',
            'for_rent' => 'alquiler',
        ];

        if (isset($return[$string])) {
            return $return[$string];
        }

        return '';
    }

    /**
     * Get caixa reduced price percentage.
     *
     * @param \App\QobrixModel\Property $property The property.
     * @return string
     */
    public static function getCaixaReducedPricePercentage($property): string
    {
        $reduced_price = $property->getWebsitePriceDifference();

        if ($reduced_price < 0) {
            $price = floatval($property->getWebsitePrice(['for_display' => false]));
            if (empty($price)) {
                return '0%';
            }
            $original_price = $price + abs($reduced_price);
            $percentage = number_format(abs($reduced_price / $original_price * 100), 2);

            return $percentage . '%';
        }

        return '0%';
    }

    /**
     * Get back link.
     *
     * @param string $sale_rent The sale rent.
     * @param string $district The district.
     * @param string $area The area.
     * @return string
     */
    public static function getBackLink($sale_rent = 'for_sale', $district = '', $area = ''): string
    {
        $propertiesPage = \App\Utils\SitesPage::getFirstPageByTemplate('properties');
        $back_link = "/{$propertiesPage->get('page_slug')}";
        $sale_rent_mapping = [
            'for_sale' => 'comprar',
            'for_rent' => 'alquilar',
        ];
        $back_link .= '/' . ($sale_rent_mapping[$sale_rent] ?? 'comprar');
        if (!empty($district)) {
            $back_link .= "/{$district}";
        }
        if (!empty($area)) {
            $back_link .= "?area={$area}";
        }

        return $back_link;
    }

    /**
     * Get property backlink title.
     *
     * @param \App\QobrixModel\Property $property The property.
     * @return string
     */
    public static function getPropertyBacklinkTitle($property): string
    {
        $sale_rent = $property->getCustomSaleRent();
        $district = $property->getLocation()->get('district');
        $referer = $_SERVER['HTTP_REFERER'] ?? null;
        $sale_rent_mapping = [
            'for_sale' => __('Buy'),
            'for_rent' => __('Rent'),
            'for_sale_and_rent' => __('Buy and Rent'),
        ];
        $sale_rent_title = $sale_rent_mapping[$sale_rent] ?? __('Buy');
        $backlink_title = '';
        if (!empty($sale_rent_title)) {
            $backlink_title = $sale_rent_title . ' inmueble ';
        }
        if (!empty($district)) {
            $backlink_title .= $district;
        }
        if (!empty($referer)) {
            $request = new \Cake\Http\ServerRequest(['url' => $referer]);
            $query = $request->getQueryParams();
            $descriptionTexts = [];
            $currencyFieldsList = [
                [
                    'list_selling_price_amount_min',
                    'list_selling_price_amount_max',
                ],
                [
                    'list_rental_price_amount_min',
                    'list_rental_price_amount_max',
                ],

            ];
            foreach ($currencyFieldsList as $currencyFields) {
                $currencyFrom = $currencyFields[0];
                $currencyTo = $currencyFields[1];
                if (!empty($query[$currencyFrom]) && !empty($query[$currencyTo])) {
                    if ($query[$currencyFrom] === $query[$currencyTo]) {
                        $descriptionTexts[] = $query[$currencyFrom];
                    } else {
                        $descriptionTexts[] = __('between {0} and {1}', $query[$currencyFrom], $query[$currencyTo]);
                    }
                } elseif (!empty($query[$currencyFrom])) {
                    $descriptionTexts[] = __('more than {0}', $query[$currencyFrom]);
                } elseif (!empty($query[$currencyTo])) {
                    $descriptionTexts[] = __('up to {0}', $query[$currencyTo]);
                }
            }
            if (!empty($query['bedrooms_min'])) {
                $descriptionTexts[] = __('{0,plural,=1{1 bedroom} other{# bedrooms}} (or more)', $query['bedrooms_min']);
            }

            if (!empty($query['bathrooms_min'])) {
                $descriptionTexts[] = __('{0,plural,=1{1 bathroom} other{# bathrooms}} (or more)', $query['bathrooms_min']);
            }
            $backlink_title .= implode(', ', $descriptionTexts);
        }

        return $backlink_title;
    }
}
