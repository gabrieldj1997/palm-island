<?php

namespace App\Game\Domain;

final class Section
{
    /**
     * @param SectionAction[] $actions
     */
    public function __construct(
        public readonly int $id,
        public readonly int $card_id,
        public readonly int $section_number,
        public readonly int $stars,
        public readonly int $improvements,
        public readonly int $wood_resource,
        public readonly int $fish_resource,
        public readonly int $stone_resource,
        public readonly array $actions,
    ) {}
    public function snapshot(): array
    {
        return [
            'id' => $this->id,
            'card_id' => $this->card_id,
            'section_number' => $this->section_number,
            'stars' => $this->stars,
            'improvements' => $this->improvements,
            'wood_resource' => $this->wood_resource,
            'fish_resource' => $this->fish_resource,
            'stone_resource' => $this->stone_resource,
            'actions' => array_map(
                fn(SectionAction $action) => [
                    'id' => $action->id,
                    'type' => $action->type,
                    'wood_cost' => $action->wood_cost,
                    'fish_cost' => $action->fish_cost,
                    'stone_cost' => $action->stone_cost,
                ],
                $this->actions
            ),
        ];
    }
}

