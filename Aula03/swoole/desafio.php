<?php

use Swoole\Coroutine\System;

// Desafio Assincronismo
// Fazer um script que deve em um corrotina colocar em channel os valores da array
// Em outra corroutina aguardar a entrada do valor no channel e exibir no console
// obs: serão 2 corrotinas distintas, e não se esqueça de fechar o channel apos completar os valores

Co\run(function () {
    $nums1 = [1.2, 4.3, 7.8, 4.5];
    $channel = new Swoole\Coroutine\Channel(1);

    // sua corrotinas aqui ...

});