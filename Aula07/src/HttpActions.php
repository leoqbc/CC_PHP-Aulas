<?php

namespace CampusCode;

use Psr\Http\Message\ResponseInterface;

interface HttpActions
{
    public function get(string $uri): ResponseInterface;
    public function post(string $uri): ResponseInterface;
    public function put(string $uri): ResponseInterface;
    public function delete(string $uri): ResponseInterface;
}
