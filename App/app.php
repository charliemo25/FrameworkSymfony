<?php

namespace App;

use App\Controller\HomeController;
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add("home", new Routing\Route("/home", [
    '_controller' => HomeController::class . "::index"
]));

$routes->add("name", new Routing\Route("/home/{name}", [
    '_controller' => HomeController::class . "::name"
]));

return $routes;
