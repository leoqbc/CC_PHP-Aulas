<?php

use Auction\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    public function testCheckCurrencyReaisValue()
    {
        $currency = new Price('R$', 2_000);

        $this->assertEquals('reais', $currency->getType());
    }

    public function testCheckCurrencyDollarsValue()
    {
        $currency = new Price('USD$', 2_000);

        $this->assertEquals('dollars', $currency->getType());
    }

    public function testCurrencyValueReturn()
    {
        $currency = new Price('R$', 5_000);

        $this->assertEquals(5_000, $currency->getValue());
    }
}