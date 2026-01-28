<?php

namespace App\Game\Domain;

final class Resource
{
    public function __construct(
        public readonly int $wood,
        public readonly int $fish,
        public readonly int $stone,
    ) {}
    public function addWood(int $amount): self
    {
        return new self(
            wood: $this->wood + $amount,
            fish: $this->fish,
            stone: $this->stone,
        );
    }
    public function addFish(int $amount): self
    {
        return new self(
            wood: $this->wood,
            fish: $this->fish + $amount,
            stone: $this->stone,
        );
    }
    public function addStone(int $amount): self
    {
        return new self(
            wood: $this->wood,
            fish: $this->fish,
            stone: $this->stone + $amount,
        );
    }
}