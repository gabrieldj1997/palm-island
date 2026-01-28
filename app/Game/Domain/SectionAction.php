<?php

namespace App\Game\Domain;
use Illuminate\Support\Facades\Log;
final class SectionAction
{
    public const TYPE_PURCHASE = 1;
    public const TYPE_ROTATE = 2;
    public const TYPE_FLIP = 3;
    public function __construct(
        public readonly int $id,
        public readonly int $type,
        public readonly int $wood_cost,
        public readonly int $fish_cost,
        public readonly int $stone_cost,
    ) {}
    public function toResourceCost(): Resource
    {
        return new Resource(
            wood: $this->wood_cost,
            fish: $this->fish_cost,
            stone: $this->stone_cost,
        );
    }
    public function compareResourceCost(Resource $resourceAvailable): bool
    {
        $resourceCost = $this->toResourceCost();
        if (in_array($this->id, [64, 71, 72,75,77,79])) {
            return $resourceAvailable->wood >= $resourceCost->wood
                || $resourceAvailable->fish >= $resourceCost->fish
                || $resourceAvailable->stone >= $resourceCost->stone;
        }
        return $resourceAvailable->wood >= $resourceCost->wood
            && $resourceAvailable->fish >= $resourceCost->fish
            && $resourceAvailable->stone >= $resourceCost->stone;
    }
}
