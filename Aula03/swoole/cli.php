<?php

require __DIR__ . '/vendor/autoload.php';

use Swoole\Coroutine as co;

// $client = new GuzzleHttp\Client();

// for ($i=1; $i <= 10; $i++) { 
//     $response = $client->get('https://jsonplaceholder.typicode.com/users/' . $i);
//     $user = json_decode((string)$response->getBody());
//     echo $user->name . PHP_EOL;
// }

// ativa as corrotinas
// coroutines
// Co\run(function () {
//     $client = new GuzzleHttp\Client();

//     for ($i=1; $i <= 10; $i++) {

//         go(function () use ($client, $i) {
//             $response = $client->get('https://jsonplaceholder.typicode.com/users/' . $i);
//             $user = json_decode((string)$response->getBody());
//             echo $user->name . PHP_EOL;
//         });

//     }
// });


// Co\run(function () {

//     go(function () {
//         co::sleep(1);
//         echo 1;
//     });

//     go(function () {
//         co::sleep(1);
//         echo 2;
//     });

//     go(function () {
//         co::sleep(1);
//         echo 3;
//     });

// });

Co\run(function () {

    go(function () {
        while (1) {
            co::sleep(1);
            echo 'Infinito1' . PHP_EOL;
        }
    });

    go(function () {
        while (1) {
            co::sleep(2);
            echo 'Infinito2' . PHP_EOL;
        }
    });

});

// sleep(1);
// echo 1;
// sleep(1);
// echo 2;
// sleep(1);
// echo 3;

// echo 'Terminou';