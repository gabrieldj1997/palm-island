<?php

namespace App\Game\UseCases;

use Illuminate\Support\Facades\DB;
use App\Game\Actions\RotateCardAction;
use App\Game\Loaders\GameStateLoader;
use App\Game\Persistence\GameStatePersister;

final class RotateCard
{
    public function __construct(
        private GameStateLoader $loader,
        private GameStatePersister $persister,

    ) {}
    public function execute(int $gameId, int $action_card, array $spent_cards): void
    {
        DB::transaction(function () use ($gameId, $action_card, $spent_cards) {

            $state = $this->loader->load($gameId);

            $state = $state->apply(new RotateCardAction($action_card, $spent_cards));

            $this->persister->save($state);
        });
    }
}
