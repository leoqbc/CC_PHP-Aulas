<?php
require __DIR__ . '/../vendor/autoload.php';

use Swoole\Coroutine as co;

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$server = new Server('0.0.0.0', 80);

$server->on('Start', function () {
    echo "Server started on port: 80 \n";
});

$server->on('Request', function (Request $request, Response $response) {
    if ($request->header['sec-fetch-dest'] === 'image') {
        return $response->setStatusCode(404);
    }


    // operação lenta
    sleep(2);
    echo "Terminou a entrega\n";

    $response->setHeader('Content-Type', 'application/json');
    $response->end(json_encode([
            'hello' => 'world2'
    ]));
});

$server->start();