<?php

use Swoole\Coroutine as co;

require __DIR__ . '/../vendor/autoload.php';

// Co\run(function () {

//     go(function () {
//         echo 'Olá' . PHP_EOL;

//         sleep(1);
//         echo 'Mundo' . PHP_EOL;

//         sleep(2);
//         echo 'do PHP' . PHP_EOL;
//     });

//     go(function () {
//         while (1) {
//             sleep(1);
//             echo 'Infinto!';
//         }
//     });

// });

$channel = new Swoole\Coroutine\Channel(1);

Co\run(function () use ($channel) {

    go(function () use ($channel) {
        for ($i=1; $i <= 10; $i++) {
            co::usleep(500_000);
            $channel->push($i);
        }
        $channel->close();
    });

    go(function () use ($channel) {
        while($result = $channel->pop()) {
            echo $result . PHP_EOL;
        }
    });

});
