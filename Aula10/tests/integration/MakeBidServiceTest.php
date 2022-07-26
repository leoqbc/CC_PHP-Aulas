<?php

use Auction\Price;
use Auction\Service\MakeBid;
use PHPUnit\Framework\TestCase;

class MakeBidServiceTest extends TestCase
{
    public function testMakeBidFails()
    {
        $makeBidService = new MakeBid();

        $current = new Price("R$", 1_000);
        $bid     = new Price("USD$", 1_500);

        $this->expectExceptionMessage("Error the currency not match");

        $makeBidService->handle($current, $bid);
    }

    public function testMakeBidFailsInverted()
    {
        $makeBidService = new MakeBid();

        $current = new Price("EU$", 1_000);
        $bid     = new Price("R$", 900);

        $this->expectExceptionMessage("Error the currency not match");

        $makeBidService->handle($current, $bid);
    }

    public function testMakeBidIsNotAccepted()
    {
        $makeBidService = new MakeBid();

        $current = new Price("R$", 1_000);
        $bid     = new Price("R$", 900);

        $this->expectExceptionMessage("Bid should be greater than 1000");

        $makeBidService->handle($current, $bid);
    }

    public function testMakeBidIsAccepted()
    {
        $makeBidService = new MakeBid();

        $current = new Price("R$", 1_000);
        $bid     = new Price("R$", 1_500);

        $result = $makeBidService->handle($current, $bid);

        // verifa com " === "
        $this->assertSame(true, $result);
    }
}