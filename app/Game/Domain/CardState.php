<?php

namespace App\Game\Domain;

use App\Game\Domain\Exceptions\UnknownActionException;
use App\Models\SectionAction;

final class CardState
{
    public function __construct(
        public readonly int $card_id,
        public readonly int $position,
        public readonly int $section_active,
        public readonly bool $resource_available,
        public readonly Card $card,
        public readonly SectionState $section,
    ) {}
    public function snapshot(): array
    {
        return [
            'card' => $this->card->snapshot(),
            'section' => $this->section->snapshot(),
            'position' => $this->position,
            'resource_available' => $this->resource_available,
            'section_active' => $this->section_active,
        ];
    }
    public function withPosition(int $position): self
    {
        return new self(
            card_id: $this->card_id,
            position: $position,
            section_active: $this->section_active,
            resource_available: $this->resource_available,
            card: $this->card,
            section: $this->section
        );
    }
    public function rotateCard(): self{
        if (in_array($this->position, [1,3], true)){
            return $this->withPosition($this->position + 1);
        }
        return $this->withPosition($this->position - 1);
    }
    public function flipCard(): self{
        if (in_array($this->position, [1,2], true)){
            return $this->withPosition($this->position + 2);
        }
        return $this->withPosition($this->position - 2);
    }
    public function withResourceAvailable(bool $resource_available): self
    {
        return new self(
            card_id: $this->card_id,
            position: $this->position,
            section_active: $this->section_active,
            resource_available: $resource_available,
            card: $this->card,
            section: $this->section
        );
    }
    public function isEndTurn(): bool
    {
        return $this->card->isEndTurn();
    }
    public function validateBuyAction(Resource $resourceAvailable, int $type_action): bool
    {
        return match($type_action) {
            SectionActionState::TYPE_PURCHASE => collect($this->section->actions)->where('type', SectionActionState::TYPE_PURCHASE)
            ->first()->compareResourceCost($resourceAvailable),
            SectionActionState::TYPE_ROTATE => collect($this->section->actions)->where('type', SectionActionState::TYPE_ROTATE)
            ->first()->compareResourceCost($resourceAvailable),
            SectionActionState::TYPE_FLIP => collect($this->section->actions)->where('type', SectionActionState::TYPE_FLIP)
            ->first()->compareResourceCost($resourceAvailable),
            default => throw new UnknownActionException,
        };
    }

}


