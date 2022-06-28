<?php

require __DIR__ . '/../vendor/autoload.php';

use PhpBench\Attributes as Bench;

use GuzzleHttp\Client;
use React\Http\Browser;
use Psr\Http\Message\ResponseInterface;

class RequestBench
{
    #[
        Bench\Revs(1),
        Bench\Iterations(1)
    ]
    public function benchGuzzle()
    {
        ob_start();
        // benchmark Guzzle
        ob_end_clean();
    }

    #[
        Bench\Revs(1),
        Bench\Iterations(1)
    ]
    public function benchReactPHP()
    {
        ob_start();
        // benchmark ReactPHP
        ob_end_clean();
    }

}