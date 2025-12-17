<?php
declare(strict_types=1);

namespace Caixa\Controller;

use App\Tenancy\TenancyManagement;
use App\Utils\CommonFunctions;
use App\Utils\HtmlTags;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;


use App\Controller\PreviewController as BasePreviewController;
/**
 * Preview Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 * @method array<\App\Model\Entity\Option>|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreviewController extends BasePreviewController
{
    /**
     * Display page based on slug.
     *
     * @param string $page_slug The page slug.
     * @return \Cake\Http\Response
     */
    public function pageSlug(string $page_slug): Response
    {
        // Caixa logic to check for token in the url.
        $response = \Caixa\Utils\CaixaToken::checkTokenInCookies($this->response);
        if (!empty($response)) {
            return $response;
        }

        return parent::pageSlug($page_slug);
    }
}
