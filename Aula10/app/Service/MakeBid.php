<?php

namespace Auction\Service;

use Auction\BidRange;
use Auction\Price;

class MakeBid
{
    public function handle(Price $current, Price $bid): bool
    {
        if ($current->getType() !== $bid->getType()) {
            throw new \Exception("Error the currency not match");
        }

        $bidRange = new BidRange($current, $bid);

        if (false === $bidRange->isApproved()) {
            throw new \Exception("Bid should be greater than " . $current->getValue());
        }

        return true;
    }
}