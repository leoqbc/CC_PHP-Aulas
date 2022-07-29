<?php

namespace BeerFinder\Repository\Interface;

interface RepositoryActions
{
    public function save(object $entity): void;
    public function findById(string $className, int $id): object;
}
