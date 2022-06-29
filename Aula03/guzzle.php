<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$resultado1 = $client->get('http://localhost:8011/user/1');
$string = (string)$resultado1->getBody();
$user = json_decode($string);
echo $user->name . PHP_EOL;

$resultado2 = $client->get('http://localhost:8011/user/2');
$string = (string)$resultado2->getBody();
$user = json_decode($string);
echo $user->name . PHP_EOL;

$resultado3 = $client->get('http://localhost:8011/user/3');
$string = (string)$resultado3->getBody();
$user = json_decode($string);
echo $user->name . PHP_EOL;

$resultado4 = $client->get('http://localhost:8011/user/4');
$string = (string)$resultado4->getBody();
$user = json_decode($string);
echo $user->name . PHP_EOL;