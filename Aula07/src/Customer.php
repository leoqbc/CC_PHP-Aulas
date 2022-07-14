<?php

namespace CampusCode;

use CampusCode\HttpActions;

class Customer
{
    protected HttpActions $client;

    public function __construct(HttpActions $client)
    {
        $this->client = $client;
    }

    public function getRemoteCustomers()
    {
        try {
            $response = $this->client->get('http://jsonplaceholder.typicode.com/users');

            return json_decode((string)$response->getBody());
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}