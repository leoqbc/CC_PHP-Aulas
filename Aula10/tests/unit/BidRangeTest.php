<?php

use Auction\Price;
use Auction\BidRange;

use PHPUnit\Framework\TestCase;

class BidRangeTest extends TestCase
{
    public function testBidRangeIsNotApproved()
    {
        /**
         * @var Auction\Price $price
         */
        $price = $this->getMockBuilder(Price::class)
                        ->setConstructorArgs(['R$', 2_000])
                        ->onlyMethods(['getType'])
                        ->getMock();

        /**
         * @var Auction\Price $bid
         */
        $bid = $this->getMockBuilder(Price::class)
                        ->setConstructorArgs(['R$', 1_000])
                        ->onlyMethods(['getType'])
                        ->getMock();

        $bidRange = new BidRange($price, $bid);

        $this->assertFalse(false);
    }

    public function testBidRangeIsApproved()
    {
        /**
         * @var Auction\Price $price
         */
        $price = $this->getMockBuilder(Price::class)
                        ->setConstructorArgs(['R$', 2_000])
                        ->onlyMethods(['getType'])
                        ->getMock();

        /**
         * @var Auction\Price $bid
         */
        $bid = $this->getMockBuilder(Price::class)
                        ->setConstructorArgs(['R$', 2_001])
                        ->onlyMethods(['getType'])
                        ->getMock();

        $bidRange = new BidRange($price, $bid);

        $this->assertTrue(true);
    }
}