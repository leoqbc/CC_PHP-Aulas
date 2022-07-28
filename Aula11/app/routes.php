<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use BeerFinder\Controller\Hello;

/**
 * @var \Slim\App $app
 */

$app->post('/beers', [ Hello::class, 'index' ]);