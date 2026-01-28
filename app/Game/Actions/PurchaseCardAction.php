<?php

namespace App\Game\Actions;

use App\Game\Domain\GameState;

final class PurchaseCardAction implements GameAction
{
    public function __construct(
        private int $purchase_card,
        private array $spent_cards,
    ) {}
    public function execute(GameState $state): GameState
    {
        return $state->purchaseCard($this->purchase_card, $this->spent_cards);
    }
}
