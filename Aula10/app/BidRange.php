<?php

namespace Auction;

class BidRange
{
    public function __construct(
        protected Price $current,
        protected Price $bid,
    ) {
        # code...
    }

    public function isApproved(): bool
    {
        if ($this->bidIsLowerThanCurrent()) {
            return false;
        }
        return true;
    }

    protected function bidIsLowerThanCurrent()
    {
        return $this->bid->getValue() <= $this->current->getValue();
    }
}