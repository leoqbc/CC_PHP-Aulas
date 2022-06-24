<?php

$numeros = range(1, 10_000);

function filtraNumeros(array $numeros) {
    foreach ($numeros as $numero) {
        if ($numero >= 10 && $numero <= 9_000) {
            yield $numero;
        }
    }
}

// não indicado
function filtraNumero(int $numero, array $numeros) {
    $resultado = false;
    foreach ($numeros as $numero) {
        if ($numero === $numero) {
            $resultado = true;
        }
    }
    return $resultado;
}

// sem generator 1458616 vs 930024
foreach (filtraNumeros($numeros) as $numero) {
    echo $numero;
}

// while (true) {
//     // execução simultanea
//     filtraNumeros($numeros);
//     filtraNumeros($numeros);

//     // condição para parar o loop

// }

echo PHP_EOL;
echo PHP_EOL;
echo memory_get_peak_usage();