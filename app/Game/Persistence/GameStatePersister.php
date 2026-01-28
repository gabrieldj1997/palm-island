<?php

namespace App\Game\Persistence;

use App\Game\Domain\GameState;
use App\Models\Game;
use App\Models\GameCard;
use Illuminate\Support\Facades\Log;


final class GameStatePersister
{
    public function save(GameState $state): void
    {
        $game = Game::findOrFail($state->id);

        $game->turn = $state->turn;
        $game->total_stars = $state->total_stars;
        $game->save();
        foreach ($state->deck->cards() as $cardState) {
            GameCard::where('game_id', $state->id)
                ->where('card_id', $cardState->card_id)
                ->update([
                    'position' => $cardState->position,
                    'section_active' => $cardState->section_active,
                    'resource_available' => $cardState->resource_available
                ]);
        }
    }
}
