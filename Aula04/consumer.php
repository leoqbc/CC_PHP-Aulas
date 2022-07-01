<?php

require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();

$operacao = function ($message) {
    try {
        echo $message->body . PHP_EOL;

        throw new \Exception("Erro");
        
        // avisa final do processamento
        $message->ack();
    } catch (\Exception $e) {
        return;
    }
};

$channel->basic_consume('emails', 'consumer1', false, false, false, false, $operacao);

echo 'Worker em operação' . PHP_EOL;

while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();