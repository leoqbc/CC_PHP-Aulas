<?php

namespace CampusCode;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

// Envolvendo a dependencia direta(guzzle)
// para garantir isolamento de configuração
class GuzzleRequester implements HttpActions
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function get(string $uri): ResponseInterface
    {
        return $this->client->get($uri);
    }

    public function post(string $uri): ResponseInterface
    {
        return $this->client->post($uri);
    }

    public function put(string $uri): ResponseInterface
    {
        return $this->client->put($uri);
    }

    public function delete(string $uri): ResponseInterface
    {
        return $this->client->delete($uri);
    }

}