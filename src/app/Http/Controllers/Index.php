<?php

namespace PhpTodoList\Http\Controllers;

use Doctrine\DBAL\Connection;

class Index
{
    public function __construct(
        protected Connection $dbConnection,
    ) {
    }

    public function __invoke(): string
    {
        return json_encode([
            'db-connected' => $this->dbConnection->isConnected(),
            'php-version' => phpversion(),
        ]);
    }
}
