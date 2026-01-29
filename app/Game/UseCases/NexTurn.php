<?php

namespace App\Game\UseCases;

use Illuminate\Support\Facades\DB;
use App\Game\Actions\NextTurnAction;
use App\Game\Loaders\GameStateLoader;
use App\Game\Persistence\GameStatePersister;

final class NextTurn    
{
    public function __construct(
        private GameStateLoader $loader,
        private GameStatePersister $persister,

    ) {}
    public function execute(int $gameId): void
    {
        DB::transaction(function () use ($gameId) {

            $state = $this->loader->load($gameId);

            $state = $state->apply(new NextTurnAction());

            $this->persister->save($state);
        });
    }
}
