<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
]));

$routes->add('show', new Routing\Route('/show/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::show',
]));

$routes->add("home", new Routing\Route("/home", [
    '_controller' => 'Home\Controller\HomeController::index'
]));

$routes->add("name", new Routing\Route("/home/{name}", [
    '_controller' => 'Home\Controller\HomeController::name'
]));

return $routes;
