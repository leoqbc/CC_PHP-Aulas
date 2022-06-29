<?php

require __DIR__ . '/vendor/autoload.php';

use React\Http\Browser;

$client = new Browser();

$client->get('http://localhost:8011/user/1')->then(function ($response) {
    $string = (string)$response->getBody();
    $user = json_decode($string);
    echo $user->name . PHP_EOL;
});

$client->get('http://localhost:8011/user/2')->then(function ($response) {
    $string = (string)$response->getBody();
    $user = json_decode($string);
    echo $user->name . PHP_EOL;
});

$client->get('http://localhost:8011/user/3')->then(function ($response) {
    $string = (string)$response->getBody();
    $user = json_decode($string);
    echo $user->name . PHP_EOL;
});


$client->get('http://localhost:8011/user/4')->then(function ($response) {
    $string = (string)$response->getBody();
    $user = json_decode($string);
    echo $user->name . PHP_EOL;
});

