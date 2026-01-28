<?php

namespace App\Game\UseCases;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Game\Actions\PurchaseCardAction;
use App\Game\Loaders\GameStateLoader;
use App\Game\Persistence\GameStatePersister;

final class PurchaseCard
{
    public function __construct(
        private GameStateLoader $loader,
        private GameStatePersister $persister,

    ) {}
    public function execute(int $gameId, int $purchase_card, array $spent_cards): void
    {
        DB::transaction(function () use ($gameId, $purchase_card, $spent_cards) {

            $state = $this->loader->load($gameId);

            $state = $state->apply(new PurchaseCardAction($purchase_card, $spent_cards));

            $this->persister->save($state);

            Log::info("Jogador id: {$state->user_id} comprou a carta: {$purchase_card} e gastou as cartas: ". json_encode($spent_cards) ." no jogo id: {$gameId}");
        });
    }
}
