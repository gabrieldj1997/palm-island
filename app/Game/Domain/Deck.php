<?php

namespace App\Game\Domain;

final class Deck
{
    /** @var CardState[] */
    private array $cards;
    private const MAX_CARDS_AVAILABLE = 3;

    public function __construct(array $cards)
    {
        $this->cards = array_values($cards);
    }
    public function snapshot(): array
    {
        return array_map(
            fn(CardState $card) => $card->snapshot(),
            $this->cards
        );
    }
    public function cards(): array
    {
        return $this->cards;
    }
    public function isFirstOrSecondCard(int $card_id): bool
    {
        return collect($this->cards)
            ->sort(fn($a, $b) => $a->position <=> $b->position)
            ->take(2)
            ->contains(fn($card) => $card->card_id === $card_id);
    }
    public function firstCard(): CardState
    {
        return $this->cards[0];
    }
    public function secondCard(): CardState
    {
        return $this->cards[1];
    }
    public function isEmpty(): bool
    {
        return empty($this->cards);
    }
    public function discardFirstCard(): self
    {
        $discardedCard = array_shift($this->cards);
        $this->cards[] = $discardedCard;

        $this->reindex();
        return $this;
    }
    public function discardCardById(int $card_id): self
    {
        $discardedCard = collect($this->cards)->first(fn($card) => $card->card_id === $card_id);

        $this->cards = array_values(array_filter(
            $this->cards,
            fn(CardState $card) => $card->card_id !== $card_id
        ));

        $this->cards[] = $discardedCard;

        $this->reindex();
        return $this;
    }
    private function reindex(): void
    {
        $this->cards = array_map(
            fn(CardState $card, int $i) => $card->withPosition($i),
            $this->cards,
            array_keys($this->cards)
        );
    }
    public function canPurchase(): bool
    {
        $qtd = collect($this->cards)
            ->filter(fn(CardState $card) => $card->resource_available)
            ->count();
        return $qtd < self::MAX_CARDS_AVAILABLE;
    }
    public function totalResourceForCards($spent_cards): Resource
    {
        $wood = collect($this->cards)->whereIn('card_id', $spent_cards)
            ->sum(fn(CardState $card) => $card->resource_available ? $card->section->wood_resource : 0);
        $fish = collect($this->cards)->whereIn('card_id', $spent_cards)
            ->sum(fn(CardState $card) => $card->resource_available ? $card->section->fish_resource : 0);
        $stone = collect($this->cards)->whereIn('card_id', $spent_cards)
            ->sum(fn(CardState $card) => $card->resource_available ? $card->section->stone_resource : 0);
        return new Resource($wood, $fish, $stone);
    }
    public function totalStars(): int
    {
        return collect($this->cards)
            ->sum(fn(CardState $card) => $card->section->stars);
    }
    public function changeAndDiscardCard(CardState $newCard, array $spent_cards): self
    {
        $this->cards = array_map(
            fn(CardState $card) => $card->card_id === $newCard->card_id ? $newCard : $card,
            $this->cards
        );
        $this->spendCards($spent_cards);

        return $this->discardCardById($newCard->card_id);
    }
    public function spendCards(array $spent_cards): self
    {
        $this->cards = array_map(
            fn(CardState $card) => in_array($card->card_id, $spent_cards) ? $card->withResourceAvailable(false) : $card,
            $this->cards
        );
        return $this;
    }
}
