<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

for ($i = 1;$i <= 5; $i++) {
    $response = $client->get('http://localhost:8011/user/' . $i);

    $user = json_decode((string)$response->getBody());
    echo $user->name . PHP_EOL;
}