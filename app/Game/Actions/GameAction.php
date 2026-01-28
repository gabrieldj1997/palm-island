<?php

namespace App\Game\Actions;

use App\Game\Domain\GameState;

interface GameAction
{
    public function execute(GameState $state): GameState;
}
