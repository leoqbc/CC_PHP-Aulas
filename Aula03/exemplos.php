<?php
class MockPromise
{
    public function then(callable $response, callable $error = null)
    {
        return 1;
    }
} 

function operacao_rapida() { return new MockPromise(); }
function operacao_media() { return new MockPromise(); }
function operacao_longa() { return new MockPromise(); }


// Código síncrono

// 0.2s
$resultado1 = operacao_rapida();

// 4s
$resultado2 = operacao_longa();

// 3s
$resultado3 = operacao_longa();

// 1s
$resultado4 = operacao_media();

// Resultado sai em 8.2s
var_dump($resultado1, $resultado2, $resultado3, $resultado4);

// Código assíncrono

// 0.2s
operacao_rapida()->then(function (Psr\Http\Message\ResponseInterface $response) {
    echo $response;
});

// 4s
operacao_longa()->then(function (Psr\Http\Message\ResponseInterface $response) {
    echo $response;
});

// 3s
operacao_longa()->then(function (Psr\Http\Message\ResponseInterface $response) {
    echo $response;
});

// 1s
operacao_media()->then(function (Psr\Http\Message\ResponseInterface $response) {
    echo $response;
});

// Resultado exibido em 4s 

