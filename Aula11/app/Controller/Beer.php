<?php

namespace BeerFinder\Controller;

use BeerFinder\Entity\Beer as EntityBeer;

use BeerFinder\UseCase\CreateBeer;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Beer
{
    public function __construct(
        protected readonly CreateBeer $createBeerUseCase
    ) {
        # code...
    }
    
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $beer = json_decode( (string)$request->getBody() );
            $this->createBeerUseCase->handle($beer);
            return $response->withStatus(201);
        } catch (\Exception $ex) {
            $response = $response->withStatus(500);
            $response->getBody()->write($ex->getMessage());
            return $response;
        }
        
    }
}