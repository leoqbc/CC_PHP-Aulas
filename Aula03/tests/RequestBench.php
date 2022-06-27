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
        $client = new Client();

        for ($i = 1;$i <= 5; $i++) {
            $response = $client->get('http://localhost:8011/user/' . $i);

            $user = json_decode((string)$response->getBody());
            echo $user->name . PHP_EOL;
        }
        ob_end_clean();
    }

    #[
        Bench\Revs(1),
        Bench\Iterations(1)
    ]
    public function benchReactPHP()
    {
        ob_start();
        $client = new Browser();

        for ($i = 1;$i <= 5; $i++) {
            $client->get('http://localhost:8011/user/' . $i)->then(function (ResponseInterface $response) use ($i) {
                if ($response->getStatusCode() === 200) {
                    $user = json_decode((string)$response->getBody());
                    echo $user->name . PHP_EOL;
                }
            });
        }
        ob_end_clean();
    }

}