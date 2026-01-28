<?php

namespace App\Game\DTOs;

use Illuminate\Support\Facades\DB;

final class SectionDTO
{

    public function __construct(
        public readonly int $id,
        public readonly int $card_id,
        public readonly int $order,
        public readonly int $stars,
        public readonly int $improvements,
        public readonly int $wood_resource,
        public readonly int $fish_resource,
        public readonly int $stone_resource,
    ) {}
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            card_id: $data['card_id'],
            order: $data['order'],
            stars: $data['stars'] ?? 0,
            improvements: $data['improvements'] ?? 0,
            wood_resource: $data['wood_resource'] ?? 0,
            fish_resource: $data['fish_resource'] ?? 0,
            stone_resource: $data['stone_resource'] ?? 0,
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'card_id' => $this->card_id,
            'order' => $this->order,
            'stars' => $this->stars,
            'improvements' => $this->improvements,
            'wood_resource' => $this->wood_resource,
            'fish_resource' => $this->fish_resource,
            'stone_resource' => $this->stone_resource,
        ];
    }
}
