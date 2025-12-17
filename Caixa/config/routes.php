<?php
use Cake\Routing\RouteBuilder;
use Caixa\Routing\CaixaSiteRouteBuilder;
use App\Tenancy\TenancyManagement;

return static function (RouteBuilder $routes) {
    $routes->prefix('api', function (RouteBuilder $builder) {
        $builder->connect('/location/{action}/*', [
            'plugin' => 'Caixa',
            'controller' => 'Location'
        ]);
    });
};