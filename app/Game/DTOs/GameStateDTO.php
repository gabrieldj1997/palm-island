<?php

namespace App\Game\DTOs;

final class GameDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $user_id,
        public readonly int $seed,
        public readonly int $turn,
        public readonly int $total_stars,
    ) {}
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            user_id: $data['user_id'],
            seed: $data['seed'],
            turn: $data['turn'],
            total_stars: $data['total_stars'] ?? 0
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'seed' => $this->seed,
            'turn' => $this->turn,
            'total_stars' => $this->total_stars,
        ];
    }
}
