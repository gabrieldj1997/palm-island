<?php

namespace App\Game\Actions;

use App\Game\Domain\GameState;

final class DiscardCardAction implements GameAction
{
    public function execute(GameState $state): GameState
    {
        return $state->discardFirstCard();
    }
}

