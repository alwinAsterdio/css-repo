<?php
declare(strict_types=1);

namespace Caixa\Routing;

use App\Routing\SiteRouteBuilder as BaseSiteRouteBuilder;

/**
 * RouteBuilder to handle the different logic between the main site and the rest of the sites.
 */
class SiteRouteBuilder extends BaseSiteRouteBuilder
{
    protected static array $routeDefaults = [
        'plugin' => 'Caixa', 'controller' => 'Preview', 'action' => 'pageSlug',
    ];
}
