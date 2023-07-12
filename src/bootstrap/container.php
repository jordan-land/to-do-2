<?php

declare(strict_types=1);

use DI\Container;
use Doctrine\DBAL\Connection;

return new Container([
    Connection::class => require realpath(__DIR__ . '/database.php'),
]);
