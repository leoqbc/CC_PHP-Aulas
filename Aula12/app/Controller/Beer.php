<?php

namespace BeerFinder\Controller;

use BeerFinder\UseCase\InsertBeer;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Beer
{
    protected InsertBeer $insertBeerUseCase;

    public function __construct(InsertBeer $insertBeerUseCase)
    {
        $this->insertBeerUseCase = $insertBeerUseCase;
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        try {
            $body = (string)$request->getBody();
            $parsed = json_decode($body);

            $this->insertBeerUseCase->handle($parsed);

            $response = $response->withStatus(201);

            $response->getBody()->write('Sucesso');
            return $response;
        } catch (\Exception $ex) {

            $response->withStatus(500)
                     ->getBody()
                     ->write($ex->getMessage());

            return $response;
        }
        
    }
}