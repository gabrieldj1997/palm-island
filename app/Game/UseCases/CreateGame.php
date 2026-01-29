<?php

namespace App\Game\UseCases;

use App\Models\Game;
use App\Models\Card;
use App\Models\GameCard;
use DomainException;
use Illuminate\Support\Facades\DB;

final class CreateGame
{
    public function execute(int $userId, ?int $seed = null): int
    {
        try{
        return DB::transaction(function () use ($userId, $seed) {

            $cards = Card::with('sections.actions')->get();

            $endTurnCard = $cards->firstWhere('type', Card::TYPE_END_TURN);
            $deck = $cards->where('type', '<>', Card::TYPE_END_TURN)->values()->all();

            if ($cards->isEmpty()) {
                throw new \RuntimeException('No cards available to start a game.');
            }
            if ($seed === null) {
                $seed = '';
                for ($i = 0; $i < 5; $i++) {
                    $seed .= chr(random_int(65, 90));
                }
            }

            $seedInt = 0;

            foreach (str_split($seed) as $char) {
                $seedInt += ord($char);
            }

            mt_srand($seedInt);
            shuffle($deck);
            mt_srand();

            $deck[] = $endTurnCard;

            $game = Game::create([
                'user_id' => $userId,
                'seed' => $seed,
                'turn' => 1,
                'total_stars' => 0,
            ]);

            foreach ($deck as $position => $card) {
                GameCard::create([
                    'game_id' => $game->id,
                    'card_id' => $card->id,
                    'position' => $position,
                    'section_active' => 1,
                    'resource_available' => false,
                ]);
            }

            return $game->id;
        });
        }Catch(DomainException $e){
            return $e->getCode();
        }
    }
}
