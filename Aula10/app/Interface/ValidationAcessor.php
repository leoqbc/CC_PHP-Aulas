<?php

namespace Auction\Interface;

interface ValidationAcessor
{
    public function getValue(): mixed;
    public function getType(): string;
}