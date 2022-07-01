<?php
require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();

$message = new AMQPMessage('João|joao@email.com');

$channel->basic_publish($message, '', 'emails');

echo 'Mensagem colocada na fila';

$channel->close();
$connection->close();