<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// 정적 경로 우선 순위
$routes->get('sitemap.xml', 'SitemapController::index');
$routes->get('sitemap/generate/(:segment)', 'SitemapController::generate/$1');
$routes->get('sitemap/generate/(:segment)/(:num)', 'SitemapController::generate/$1/$2');

// 메인 페이지
$routes->get('/', 'Home::index');


$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    $routes->get('(:any)/(:num)', 'HealthService::detail/$1/$2');
    $routes->get('(:any)', 'HealthService::index/$1');
});
