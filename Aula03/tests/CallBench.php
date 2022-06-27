<?php

require __DIR__ . '/../vendor/autoload.php';

use PhpBench\Attributes as Bench;

class CallBench
{
    #[
        Bench\Revs(1),
        Bench\Iterations(1)
    ]
    public function benchForeach()
    {
        foreach(range(1, 10) as $value) {
            usleep(5);
        }
    }

    #[
        Bench\Revs(1),
        Bench\Iterations(1)
    ]
    public function benchFor()
    {
        for($i = 1; $i <= 10; ++$i) {
            usleep(5);
        }
    }
}