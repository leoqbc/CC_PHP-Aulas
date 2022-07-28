<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

use BeerFinder\ContainerBuilder;

$container = ContainerBuilder::create();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Transform JSON or XML in PHP data
$app->addBodyParsingMiddleware();

require __DIR__ . '/../app/routes.php';

$app->run();