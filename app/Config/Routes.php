<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('temporadas', 'Temporadas::index'); // http://localhost/futbol-back/public/api/temporadas 
    $routes->get('temporadas/(:num)', 'Temporadas::show/$1'); // 
}); 

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('entrenadores', 'Entrenadores::index'); // http://localhost/futbol-back/public/api/entrenadores/
    $routes->get('entrenadores/(:num)', 'Entrenadores::show/$1'); // http://localhost/futbol-back/public/api/entrenadores/232400
});

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('jugadores', 'Jugadores::index'); // http://localhost/futbol-back/public/api/jugadores
    $routes->get('jugadores/(:num)', 'Jugadores::show/$1'); //http://localhost/futbol-back/public/api/jugadores/232401
    $routes->get('jugadores/(:num)/temporadas/(:num)', 'Jugadores::partidos/$1/$2'); // http://localhost/futbol-back/public/api/jugadores/232401/temporadas/2324

});

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('partidos', 'Partidos::index'); // http://localhost/futbol-back/public/api/partidos/
    $routes->get('partidos/temporada/(:num)', 'Partidos::temporada/$1'); // http://localhost/futbol-back/public/api/partidos/temporada/2324
    $routes->get('partidos/(:num)', 'Partidos::show/$1'); // http://localhost/futbol-back/public/api/partidos/232401
});

$routes->get('/', 'ApiDoc::index');

