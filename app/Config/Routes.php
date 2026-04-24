<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    $routes->get('(:any)/(:num)', 'HealthService::detail/$1/$2');
    $routes->get('(:any)', 'HealthService::index/$1');
});
