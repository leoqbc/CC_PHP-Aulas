<?php

namespace BeerFinder\Factory\Controller;

use BeerFinder\Controller\Beer;
use BeerFinder\UseCase\CreateBeer;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Psr\Container\ContainerInterface;

class HelloControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new Beer( $container->get( CreateBeer::class ) );
    }
}