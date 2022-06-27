<?php

require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;

$client = new Browser();

for ($i = 1;$i <= 10; $i++) {
    $client->get('http://localhost:8011/user/' . $i)->then(function (ResponseInterface $response) use ($i) {
        if ($response->getStatusCode() === 200) {
            $user = json_decode((string)$response->getBody());
            echo $user->name . PHP_EOL;
        }
    });
}