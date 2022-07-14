<?php

require __DIR__ . '/vendor/autoload.php';

use CampusCode\Customer;
use CampusCode\GuzzleRequester;

use GuzzleHttp\Client;

$requester = new GuzzleRequester(new Client());

$customer = new Customer($requester);

$result = $customer->getRemoteCustomers();

var_dump($result[0]);