<?php

namespace App\Game\Domain;

use SebastianBergmann\GlobalState\Snapshot;

final class Card
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $type,

    ) {}
    public function snapshot(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
        ];
    } 
    public function isEndTurn(): bool
    {
        return $this->type === 'end_turn';
    }
}