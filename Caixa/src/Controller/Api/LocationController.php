<?php
declare(strict_types=1);

namespace Caixa\Controller\Api;

use App\Controller\Api\LocationController as BaseLocationController;

/**
 * Location Controller
 */
class LocationController extends BaseLocationController
{
    /**
     * Search for a all.
     *
     * @param string $qobrix_module Qobrix module.
     * @return \Cake\Http\Response
     */
    public function search(string $qobrix_module): object
    {
        $response = [];
        $query_params = $this->request->getQuery();
        $search_word = str_replace(',', '', \App\Utils\CommonFunctions::filterString($query_params['search'] ?? ''));

        if (in_array($qobrix_module, ['locations'])) {
            $response = \Caixa\Connector\CaixaLocation::caixaSpecialSearch($search_word);
        } elseif (in_array($qobrix_module, ['properties', 'projects'])) {
            $response = \App\Connector\Location::searchAll($qobrix_module, $search_word);
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($response));
    }
}
