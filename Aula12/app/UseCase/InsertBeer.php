<?php
namespace BeerFinder\UseCase;

use BeerFinder\Entity\Beer;
use BeerFinder\Repository\Database\Repository;
use BeerFinder\Repository\Interface\RepositoryActions;

class InsertBeer
{
    public function __construct(
        protected RepositoryActions $repository
    ) {
        # code...
    }

    public function handle(object $beerData)
    {
        $beerEntity = new Beer(
            $beerData->name,
            $beerData->brand,
            $beerData->price
        );

        $beerEntity->validate();

        $this->repository->save($beerEntity);
    }
}