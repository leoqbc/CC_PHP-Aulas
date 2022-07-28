<?php

namespace BeerFinder\Repository\Database;

use Doctrine\DBAL\Connection;
use BeerFinder\Repository\Interface\RepositoryActions;


class Repository implements RepositoryActions
{
    public function __construct(
        protected Connection $dbal
    ) {
        # code...
    }

    public function save(object $entity): void
    {
        $pieces = explode("\\", get_class($entity));
        $className = array_pop($pieces);
        $tableName = strtolower($className);

        unset($entity->uuid);

        $this->dbal->insert( $tableName, (array)$entity );
    }

    public function findById(string $className, int $id): object
    {
        $tableName = strtolower($className);

        $pdo = $this->dbal->getNativeConnection();
        $pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_CLASS );
        $pdo->setAttribute( \PDO::ATTR_STATEMENT_CLASS, $className );

        $stmt = $pdo->query("SELECT * FROM $tableName");

        return $stmt->fetch();
    }
}