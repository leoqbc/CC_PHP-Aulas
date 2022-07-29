<?php
declare(strict_types=1);

namespace BeerFinder\Entity;

use Exception;

class Beer
{
    public function __construct(
        public string $name,
        public string $brand,
        public float $price,
        public string $uuid = '',
    ) {
        # code...
    }

    public function validate()
    {
        if ($this->price < 4.00) {
            throw new Exception("Price is not acceptable");
        }
    }
}