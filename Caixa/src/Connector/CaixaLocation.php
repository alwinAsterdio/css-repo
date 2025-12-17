<?php
declare(strict_types=1);

namespace Caixa\Connector;

/**
 * This class will be used to connect with qobrix api.
 */
class CaixaLocation extends \App\Connector\Location
{
    public const DISTRICT_FIELD = 'state';
    public const AREA_FIELD = 'city';
    public const SUBAREA_FIELD = 'municipality';

    /**
     * Special search for Caixa theme.
     *
     * @param string $search_word Search word.
     * @return array
     */
    public static function caixaSpecialSearch(string $search_word): array
    {
        $results = [];
        if (empty($search_word) || !is_numeric($search_word) || is_numeric($search_word) && strlen($search_word) < 3) {
            return self::specialSearch($search_word);
        }

        $data = \Caixa\Utils\CaixaLocations::findByPostalCode($search_word);

        $list = [];
        foreach ($data as $row) {
            $district = $row->get(self::DISTRICT_FIELD);
            $area = $row->get(self::AREA_FIELD);
            $postalCode = $row->get('postal_code');

            if (empty($district)) {
                continue;
            }

            $id = sprintf('%1$s.%2$s.%3$s.%4$s', $district, $area ?: '*', '*', $postalCode);
            $type = 'post_code';
            $list[$postalCode][] = [
                'id' => $id,
                'value' => $postalCode . ', ' . ($area ?: $district),
                'type' => $type,
                'district' => $district,
                'area' => $area,
                'subarea' => '',
                'post_code' => $postalCode,
                'priority' => $row->get('display_priority'),
                'search_type' => 'normal',
            ];
        }

        $final_list = [];
        foreach ($list as $postalCode => $addresses) {
            $totalAddresses = count($addresses);
            if ($totalAddresses === 1) {
                unset($addresses[0]['priority']);
                $final_list[] = $addresses[0];
                continue;
            }

            $priorityMatched = false;
            foreach ($addresses as $address) {
                if ($address['priority'] < 0.8) {
                    continue;
                }
                unset($address['priority']);
                $final_list[] = $address;
                $priorityMatched = true;
                break;
            }

            if ($priorityMatched === false) {
                // take the first one.
                $address = $addresses[0];
                $address['id'] = sprintf('%1$s.%2$s.%3$s.%4$s', $address['district'], '*', '*', $postalCode);
                $address['value'] = $postalCode . ', ' . $address['district'];
                $address['area'] = '';
                $address['subarea'] = '';
                unset($address['priority']);
                $final_list[] = $address;
            }
        }

        return $final_list;
    }
}
