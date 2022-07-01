<?php

use Swoole\Coroutine as co;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;


$server = new Server("0.0.0.0", 80);

$server->on('Start', function () {
    echo 'Swoole rodando';
});

$server->on('Request', function (Request $request, Response $response) {

    go(function() {
        co::sleep(2);
        echo PHP_EOL . 'Operação no servidor' . PHP_EOL;
    });

    $response->header('Content-Type', 'text/plain; charset=utf-8');
    $response->end('Olá mundo');
});

$server->start();