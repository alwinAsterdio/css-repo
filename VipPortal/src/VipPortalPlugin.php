<?php
namespace VipPortal;

use Cake\Core\BasePlugin;
use Cake\Routing\RouteBuilder;
use App\Tenancy\TenancyManagement;

class VipPortalPlugin extends BasePlugin
{
    public function routes(RouteBuilder $routes): void
    {
        if (!TenancyManagement::instance()->getTenancy()->getSite()->isMain()) {
            $routes->redirect('/', '/vip/login', ['status' => 302]);
        }

        parent::routes($routes);
    }
}