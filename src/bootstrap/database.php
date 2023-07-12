<?php

declare(strict_types=1);

use Doctrine\DBAL\DriverManager;

global $dbConnection;

if (!$dbConnection) {
    // Setup the database.
    $dbConnection = DriverManager::getConnection([
        'dbname' => getenv('DB_DATABASE'),
        'driver' => 'pdo_pgsql',
        'host' => getenv('DB_HOST'),
        'password' => getenv('DB_PASSWORD'),
        'port' => getenv('DB_PORT'),
        'user' => getenv('DB_USERNAME'),
    ]);

    $dbConnection->connect();
}

return $dbConnection;
