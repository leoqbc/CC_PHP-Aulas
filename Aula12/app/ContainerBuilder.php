<?php

namespace BeerFinder;

use Laminas\ServiceManager\ServiceManager;

class ContainerBuilder
{
    public static function create(): ServiceManager
    {
        return new ServiceManager(require __DIR__ . '/dependencies.php');
    }
}