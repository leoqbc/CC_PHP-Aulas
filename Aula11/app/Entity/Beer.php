<?php
declare(strict_types=1);

namespace BeerFinder\Entity;

class Beer
{
    public function __construct(
        public string $uuid = '',
        public string $name = '',
        public string $brand = '',
        public float  $price = 0.00,
    ) {
        # ...
    }

    public function canBePersisted()
    {
        return $this->price > 4.00;
    }
}