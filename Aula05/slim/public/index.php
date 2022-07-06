<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (RequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write('Hello world');
    return $response;
});

$app->post('/input', function (RequestInterface $request, ResponseInterface $response) {
    // PSR7
    $json = (string)$request->getBody();

    $obj = json_decode($json);

    $obj->adicionado = "Olá via Slim";

    $response->getBody()->write(json_encode($obj));
    
    return $response
                ->withHeader('Content-Type', 'application/json');
});

$app->run();