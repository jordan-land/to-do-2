<?php

declare(strict_types=1);

use DI\Container;
use FastRoute\Dispatcher;

require_once '../bootstrap/app.php';

/** @var Container */
$container = require '../bootstrap/container.php';

/** @var Dispatcher */
$routeDispatcher = require '../app/router.php';

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$route = $routeDispatcher->dispatch($httpMethod, $uri);

ob_start();

switch ($route[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        break;

    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        break;

    case Dispatcher::FOUND:
        $controller = $container->make($route[1]);
        echo $controller($route[2]);
        break;
}

$response = ob_get_clean();
ob_end_clean();

// We want to return JSON from all of our requests.
header('Content-Type: application/json; charset=utf-8', true, 200);
echo $response;
