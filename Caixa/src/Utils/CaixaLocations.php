<?php
declare(strict_types=1);

namespace Caixa\Utils;

use Cake\ORM\TableRegistry;

/**
 * This class will be used to handle CaixaLocations actions.
 */
class CaixaLocations
{
    /**
     * Table name.
     *
     * @var string
     */
    protected static $table_name = 'CaixaLocations';

    /**
     * Get all pages by site id.
     *
     * @param string $postCode The postal code.
     * @return array
     */
    public static function findByPostalCode(string $postCode): array
    {
        $sites_page_table = TableRegistry::getTableLocator()->get(self::$table_name);

        $query = $sites_page_table->find('all', [
            'conditions' => [
                'postal_code LIKE' => '%' . $postCode . '%', // Postal Code
            ],
            'order' => ['postal_code' => 'ASC'],
        ]);

        return $query->all()->toArray();
    }
}
