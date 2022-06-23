<?php

// cria um array de 1 a 30
$lista = range(1, 10_000);

// precisamos filtrar somente A e E

// função de filtro
function filtrarNumeros(array $lista) {
    $filtrados = [];
    foreach ($lista as $numero) {
        if ($numero >= 1 && $numero <= 9000) {
            // Atenção aqui!
            $filtrados[] = $numero;
        }
    }
    return $filtrados;
}

foreach(filtrarNumeros($lista) as $numero) {
    // echo $numero . PHP_EOL;
}

echo memory_get_peak_usage();
