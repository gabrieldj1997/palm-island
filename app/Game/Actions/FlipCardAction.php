<?php

namespace App\Game\Actions;

use App\Game\Domain\GameState;

final class FlipCardAction implements GameAction
{
    public function __construct(
        private int $action_card,
        private array $spent_cards,
    ) {}
    public function execute(GameState $state): GameState
    {
        return $state->flipCard($this->action_card, $this->spent_cards);
    }
}
