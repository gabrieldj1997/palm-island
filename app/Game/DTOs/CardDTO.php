<?php

namespace App\Game\DTOs;

use App\Game\Enums\CardTypeEnum;

final class CardDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly CardTypeEnum $card_type
    ) {}
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            card_type: CardTypeEnum::from($data['card_type'])
        );
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'card_type' => $this->card_type->value,
        ];
    }
}
