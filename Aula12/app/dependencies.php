<?php

// Configuração específica do Laminas Service Manager (DIC)

use BeerFinder\Controller\Beer;
use BeerFinder\Factory\Controller\BeerControllerFactory;
use BeerFinder\Factory\Repository\RepositoryFactory;

use BeerFinder\Factory\UseCase\InsertBeerUseCaseFactory;
use BeerFinder\Repository\Database\Repository;

use BeerFinder\UseCase\InsertBeer;

return [
    'factories' => [
        Beer::class => BeerControllerFactory::class,
        Repository::class => RepositoryFactory::class,
        InsertBeer::class => InsertBeerUseCaseFactory::class,
    ]
];