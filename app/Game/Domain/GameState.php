<?php

namespace App\Game\Domain;

use App\Game\Actions\DiscardCardAction;
use App\Game\Actions\PurchaseCardAction;
use App\Game\Actions\RotateCardAction;
use App\Game\Actions\FlipCardAction;
use App\Game\Actions\NextTurnAction;
use App\Game\Domain\Exceptions\CannotPurchaseException;
use App\Game\Domain\Exceptions\EndTurnCardException;
use App\Game\Domain\Exceptions\EndTurnNescessary;
use App\Game\Domain\Exceptions\EndTurnNescessaryException;
use App\Game\Domain\Exceptions\FirstOrSecondCardException;
use App\Game\Domain\Exceptions\NotEnoughResourceException;

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
            RotateCardAction::class => $action->execute($this),
            FlipCardAction::class => $action->execute($this),
            NextTurnAction::class => $action->execute($this),
            default => throw new \DomainException('Unsupported action'),
        };
    }
    public function coreValidation($action_card): void {
        if ($this->deck->firstCard()->isEndTurn()){
            throw new EndTurnNescessaryException;
        }
        if (!$this->deck->isFirstOrSecondCard($action_card)) {
            throw new FirstOrSecondCardException;
        }
    }
    public function discardFirstCard(): self
    {
        return $this->withDeck(
            $this->deck->discardFirstCard()
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
    public function purchaseCard(int $action_card, array $spent_cards): self
    {
        $this->coreValidation($action_card);

        if (!$this->deck->canPurchase()) {
            throw new CannotPurchaseException;
        }

        $new_card = collect($this->deck->cards())
            ->first(fn(CardState $card) => $card->card_id === $action_card);


        $resourceAvaible = $this->deck->totalResourceForCards($spent_cards);
        
        if (!$new_card->validateBuyAction($resourceAvaible, SectionActionState::TYPE_PURCHASE)) {
            throw new NotEnoughResourceException;
        }

        $new_card = $new_card->withResourceAvailable(true);

        return $this->withDeck($this->deck->changeAndDiscardCard($new_card, $spent_cards));
    }
    public function rotateCard(int $action_card, array $spent_cards): self
    {
        $this->coreValidation($action_card);

        $new_card = collect($this->deck->cards())
            ->first(fn(CardState $card) => $card->card_id === $action_card);

        $resourceAvaible = $this->deck->totalResourceForCards($spent_cards);
        
        if (!$new_card->validateBuyAction($resourceAvaible, SectionActionState::TYPE_ROTATE)) {
            throw new NotEnoughResourceException;
        }

        $new_card = $new_card->rotateCard();

        return $this->withDeck($this->deck->changeAndDiscardCard($new_card, $spent_cards));
    }
    public function flipCard(int $action_card, array $spent_cards): self
    {
        $this->coreValidation($action_card);

        $new_card = collect($this->deck->cards())
            ->first(fn(CardState $card) => $card->card_id === $action_card);

        $resourceAvaible = $this->deck->totalResourceForCards($spent_cards);
        
        if (!$new_card->validateBuyAction($resourceAvaible, SectionActionState::TYPE_ROTATE)) {
            throw new NotEnoughResourceException;
        }

        $new_card = $new_card->flipCard();

        return $this->withDeck($this->deck->changeAndDiscardCard($new_card, $spent_cards));
    }
    public function nextTurn(): self{
        if (!$this->deck->firstCard()->isEndTurn()){
            throw new EndTurnCardException;
        }

        return ($this->discardFirstCard())->incrementTurn();
    }
}
