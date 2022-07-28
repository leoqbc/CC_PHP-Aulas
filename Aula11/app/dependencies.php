<?php

use BeerFinder\Controller\Hello;
use BeerFinder\Factory\Controller\HelloControllerFactory;
use BeerFinder\Factory\Repository\RepositoryFactory;
use BeerFinder\Factory\UseCase\CreateBeerFactory;
use BeerFinder\Repository\Database\Repository;
use BeerFinder\UseCase\CreateBeer;

return [
    'factories' => [
        Hello::class      => HelloControllerFactory::class,
        Repository::class => RepositoryFactory::class,
        CreateBeer::class => CreateBeerFactory::class,
    ]
];