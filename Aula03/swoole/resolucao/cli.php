<?php

use Swoole\Coroutine\System;

require __DIR__ . '/vendor/autoload.php';

Co\run(function () {
    $channel = new Swoole\Coroutine\Channel(1);

    go(function () use ($channel) {
        for ($i=1; $i <= 10; $i++) {
            System::usleep(500_000);
            $channel->push($i);
        }
        $channel->close();
    });

    go(function () use ($channel) {
        while($result = $channel->pop()) {
            echo $result;
        }
    });
});
