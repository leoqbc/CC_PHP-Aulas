<?php

require __DIR__ . '/../vendor/autoload.php';

$app = Slim\Factory\AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (\Psr\Http\Message\RequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {
    $response->getBody()
                    ->write('Teste 123');
                    
    return $response;
});

$app->run();