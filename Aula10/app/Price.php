<?php

namespace Auction;

use Auction\Interface\ValidationAcessor;

class Price implements ValidationAcessor
{
    public function __construct(
        protected string $currency, 
        protected float  $price
    ) {
        # code...
    }

    public function getType(): string
    {
        return match($this->currency) {
            'R$' => 'reais',
            'USD$' => 'dollars',
            'EU$' => 'euros',
            default => '???'
        };
    }

    public function getValue(): float
    {
        return $this->price;
    }
}