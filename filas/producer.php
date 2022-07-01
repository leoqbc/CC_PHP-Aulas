<?php
// error_reporting(E_ALL & ~E_DEPRECATED);

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require __DIR__ . '/vendor/autoload.php';

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();

// $channel->queue_declare('hello', false, false, false, false);

$message = new AMQPMessage($argv[1]);

$channel->basic_publish($message, '', 'email_messages');

echo 'Enviado uma mensagem' . PHP_EOL;

$channel->close();
$connection->close();