<?php
require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();

$callback = function ($message) use ($channel) {
    try {
        echo $message->body;
        echo 'Consumer finalizou' . PHP_EOL;
        throw new \Exception("Erro");
        $message->ack();
    } catch (\Exception $e) {
        $channel->basic_publish(new AMQPMessage(serialize([
            'code' => $e->getCode(),
            'error' => $e->getMessage()
        ])), '', 'errors');
        $message->ack();
        return;
    }
};

$channel->basic_consume('email_messages', 'consumer1', false, false, false, false, $callback);

echo 'Consumer aguardando...' . PHP_EOL;

// eventloop
while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();