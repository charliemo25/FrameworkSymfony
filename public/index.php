<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Listener\StringResponseListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\Reference;

$routes = include __DIR__ . '/../App/app.php';
$container = include __DIR__ . '/../src/Container.php';

$container->register('listener.string_response', StringResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.string_response')]);

$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();
