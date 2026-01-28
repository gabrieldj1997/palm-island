<?php

namespace App\Game\DTOs;

final class GameCardsDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $game_id,
        public readonly int $card_id,    
        public readonly int $position,
        public readonly int $section_active,
        public readonly bool $resource_available,
    ) {}
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            game_id: $data['game_id'],
            card_id: $data['card_id'],
            position: $data['position'],
            section_active: $data['section_active'],
            resource_available: $data['resource_available'],
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'card_id' => $this->card_id,
            'position' => $this->position,
            'section_active' => $this->section_active,
            'resource_available' => $this->resource_available,
        ];
    }
}
