<?php

namespace App\Game\Domain;

use App\Game\Actions\DiscardCardAction;
use App\Game\Actions\PurchaseCardAction;
use Illuminate\Support\Facades\Log;

final class GameState
{

    public function __construct(
        public readonly int $id,
        public readonly int $user_id,
        public readonly int $seed,
        public readonly int $turn,
        public readonly int $total_stars,
        public readonly Deck $deck
    ) {}
    public function snapshot(): array
    {
        return [
            'turn' => $this->turn,
            'stars' => $this->total_stars,
            'deck' => array_map(
                fn(CardState $card) => [
                    'card_id' => $card->card_id,
                    'position' => $card->position,
                    'section_active' => $card->section_active,
                    'resource_available' => $card->resource_available,
                ],
                $this->deck->cards()
            ),
        ];
    }
    private function withDeck(Deck $deck): self
    {
        return new self(
            id: $this->id,
            user_id: $this->user_id,
            seed: $this->seed,
            turn: $this->turn,
            total_stars: $this->total_stars,
            deck: $deck
        );
    }
    public function apply(object $action): self
    {
        return match ($action::class) {
            DiscardCardAction::class => $action->execute($this),
            PurchaseCardAction::class => $action->execute($this),
            default => throw new \DomainException('Unsupported action'),
        };
    }
    public function discardFirstCard(): self
    {
        $newState = $this;

        if ($this->deck->firstCard()->isEndTurn()) {
            $newState = $newState->incrementTurn();
        }

        return $newState->withDeck(
            $newState->deck->discardFirstCard()
        );
    }
    private function incrementTurn(): self
    {
        return new self(
            id: $this->id,
            user_id: $this->user_id,
            seed: $this->seed,
            turn: $this->turn + 1,
            total_stars: $this->total_stars,
            deck: $this->deck
        );
    }
    public function purchaseCard(int $purchase_card, array $spent_cards): self
    {
        if (!$this->deck->isFirstOrSecondCard($purchase_card)) {
            throw new \DomainException('You can only purchase the first or second card in the deck');
        }
        if (!$this->deck->canPurchase()) {
            throw new \DomainException('Cannot purchase more cards, deck is full');
        }

        $new_card = collect($this->deck->cards())
            ->first(fn(CardState $card) => $card->card_id === $purchase_card);

        if ($new_card->resource_available) {
            throw new \DomainException('This card has already been purchased');
        }

        $resourceAvaible = $this->deck->totalResourceForCards($spent_cards);
        
        if (!$new_card->validatePurchase($resourceAvaible)) {
            throw new \DomainException('Not enough resources to purchase this card');
        }

        $new_card = $new_card->withResourceAvailable(true);

        return $this->withDeck($this->deck->changeCard($new_card, $spent_cards));
    }
}
