<?php
namespace BeerFinder\Factory\UseCase;

use BeerFinder\UseCase\CreateBeer;

use BeerFinder\Repository\Database\Repository;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Psr\Container\ContainerInterface;

class CreateBeerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $repository = $container->get(Repository::class);

        return new CreateBeer($repository);
    }
}
