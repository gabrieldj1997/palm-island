<?php

namespace App\Game\Domain;

final class CardState
{
    public function __construct(
        public readonly int $card_id,
        public readonly int $position,
        public readonly int $section_active,
        public readonly bool $resource_available,
        public readonly Card $card,
        public readonly Section $section,
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
    public function validatePurchase(Resource $resourceAvailable): bool
    {
        return collect($this->section->actions)->where('type', SectionAction::TYPE_PURCHASE)
            ->first()->compareResourceCost($resourceAvailable);
    }
    public function validateRotate(Resource $resourceAvailable): bool
    {
        return collect($this->section->actions)->where('type', SectionAction::TYPE_ROTATE)
            ->first()->compareResourceCost($resourceAvailable);
    }
    public function validateFlip(Resource $resourceAvailable): bool
    {
        return collect($this->section->actions)->where('type', SectionAction::TYPE_FLIP)
            ->first()->compareResourceCost($resourceAvailable);
    }

}


