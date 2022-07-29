<?php
namespace BeerFinder\Factory\Controller;

use BeerFinder\Controller\Beer;
use BeerFinder\UseCase\InsertBeer;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class BeerControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        // construção da injeção de dependencia do controller (Beer)
        return new Beer( $container->get(InsertBeer::class) );
    }
}