<?php

use BeerFinder\Controller\Beer;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @var \Slim\App $app
 */

$app->post('/beers', [Beer::class, 'index']);