<?php

namespace PhpTodoList\Http\Controllers;

use Doctrine\DBAL\Connection;

class GetTasks
{
    public function __construct(
        protected Connection $dbConnection,
    ) {
    }

    public function __invoke(): string
    {
      $queryBuilder = $this->dbConnection->createQueryBuilder();

      $query = $queryBuilder
        ->select('task', 'due_at')
        ->from('tasks');
        ;
  
        return $query;
    }
}
