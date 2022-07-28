<?php

namespace BeerFinder\UseCase;

use BeerFinder\Entity\Beer;

use BeerFinder\Repository\Interface\RepositoryActions;

use Exception;

class CreateBeer
{
    public function __construct(
        protected RepositoryActions $repository
    ) {
        # code...
    }

    public function handle(object $beer)
    {
        $beerEntity = new Beer(
            name: $beer->name,
            brand: $beer->brand,
            price: (float)$beer->price
        );

        if ($beerEntity->canBePersisted() === false) {
            throw new Exception("Error check your data");
        }
        $this->repository->save($beerEntity);
    }
}