<?php
namespace BeerFinder\Factory\UseCase;

use BeerFinder\UseCase\InsertBeer;
use BeerFinder\Repository\Database\Repository;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class InsertBeerUseCaseFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new InsertBeer($container->get(Repository::class));
    }
}