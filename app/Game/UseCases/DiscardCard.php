<?php

namespace App\Game\UseCases;

use App\Game\Actions\DiscardCardAction;
use App\Game\Loaders\GameStateLoader;
use App\Game\Persistence\GameStatePersister;
use Illuminate\Support\Facades\DB;

final class DiscardCard
{
    public function __construct(
        private GameStateLoader $loader,
        private GameStatePersister $persister,
    ) {}

    public function execute(int $game_id): void
    {
        DB::transaction(function () use ($game_id) {

            $state = $this->loader->load($game_id);

            $state = $state->apply(new DiscardCardAction());

            $this->persister->save($state);
        });
    }
}
