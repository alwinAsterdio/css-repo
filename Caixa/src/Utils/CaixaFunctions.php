<?php
declare(strict_types=1);

/**
 * This class will be used for caixa functions.
 *
 * @package Custom
 */

namespace Caixa\Utils;

/**
 * Caixa functions.
 */
class CaixaFunctions
{
    /**
     * Parse a custom website url to add the original_ref as first parameter.
     *
     * @param object $property The property.
     * @param array $site_data_options The site data options.
     * @return string
     */
    public static function customWebsiteUrlParser(object $property, array $site_data_options): string
    {
        $website_url = $property->get('website_url');

        if (empty($website_url)) {
            return $property->getUrl();
        }

        if (empty($site_data_options['custom_website_url'])) {
            return $website_url;
        }

        $custom_website_url_parts = explode('?', $site_data_options['custom_website_url'], 2);

        $new_custom_website_url = $custom_website_url_parts[0] . '?productCode=' . $property->get('original_ref');

        if (isset($custom_website_url_parts[1])) {
            $new_custom_website_url .= '&' . $custom_website_url_parts[1];
        }

        return $new_custom_website_url;
    }

    /**
     * Get Imagin details.
     * If the component is not created it will use the default values, else you can create the component and set your own values.
     *
     * @return array
     */
    public static function getImaginDetails(): array
    {
        static $imagin_data = null;
        if ($imagin_data !== null) {
            return $imagin_data;
        }

        $component_imagin_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/imagin');
        $component_imagin_data_options = json_decode($component_imagin_data['options'] ?? '{}', true);
        if (!empty($component_imagin_data_options['imagin_img'])) {
            $component_imagin_data_options['imagin_img'] = \App\Utils\SitesPage::getMediaOptionByKey($component_imagin_data_options, 'imagin_img');
        } else {
            unset($component_imagin_data_options['imagin_img']);
        }

        $default_options = [
            'imagin_title' => __('Mortgage simulator imaginBank'),
            'imagin_description' => __('You can simulate the installment with the imaginBank mortgage calculator.'),
            'imagin_img' => '/caixa/images/imagin-feature-logo.webp',
            'modal_imagin_title' => __('You are being redirected to the simulator'),
            'modal_imagin_description' => __('of imaginBank mortgages…'),
        ];

        $imagin_data = array_intersect_key(array_replace($default_options, $component_imagin_data_options), $default_options);

        return $imagin_data;
    }
}
