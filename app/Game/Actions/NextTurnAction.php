<?php

namespace App\Game\Actions;

use App\Game\Domain\GameState;

final class NextTurnAction implements GameAction
{
    public function __construct(
    ) {}
    public function execute(GameState $state): GameState
    {
        return $state->nextTurn();
    }
}
