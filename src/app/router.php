<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use PhpTodoList\Http\Controllers\Index;

use function FastRoute\simpleDispatcher;

return simpleDispatcher(function (RouteCollector $routes) {
    $routes->addRoute('GET', '/', Index::class);
});
