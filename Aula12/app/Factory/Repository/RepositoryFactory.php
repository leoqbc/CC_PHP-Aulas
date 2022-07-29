<?php

namespace BeerFinder\Factory\Repository;

use BeerFinder\Repository\Database\Repository;

use Doctrine\DBAL\DriverManager;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class RepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): Repository
    {
        $connectionParams = [
            'dbname'    => getenv('DB_NAME'),
            'user'      => getenv('DB_USER'),
            'password'  => getenv('DB_PASSWORD'),
            'host'      => getenv('DB_HOST'),
            'driver'    => getenv('DB_DRIVER'),
        ];

        $dbal = DriverManager::getConnection($connectionParams);

        return new Repository($dbal);
    }
}