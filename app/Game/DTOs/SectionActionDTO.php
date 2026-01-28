<?php

namespace App\Game\DTOs;

use App\Game\Enums\ActionEnum;

final class SectionActionDTO{
    public function __construct(
        public readonly int $id,
        public readonly int $section_id,
        public readonly ActionEnum $type,
        public readonly int $wood_cost,
        public readonly int $fish_cost,
        public readonly int $stone_cost,
    ) {}
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            section_id: $data['section_id'],
            type: ActionEnum::from($data['type']),
            wood_cost: $data['wood_cost'] ?? 0,
            fish_cost: $data['fish_cost'] ?? 0,
            stone_cost: $data['stone_cost'] ?? 0,
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'section_id' => $this->section_id,
            'type' => $this->type->value,
            'wood_cost' => $this->wood_cost,
            'fish_cost' => $this->fish_cost,
            'stone_cost' => $this->stone_cost,
        ];
    }
}