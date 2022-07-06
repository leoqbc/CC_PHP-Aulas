<?php

use phpseclib3\Crypt\DSA\Formats\Keys\XML;

ini_set('display_errors', 1);

function loadClass(string $classname) {
    require_once __DIR__ . '/src/' . $classname . '.php';
}

spl_autoload_register('loadClass');

$classe1 = new Classe();
$classe2 = new Classe();

echo $classe1::NOME;
