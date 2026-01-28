<?php

namespace App\Game\Loaders;

use App\Models\Game;
use App\Game\Domain\GameState;
use App\Game\Domain\Deck;
use App\Game\Domain\CardState;
use App\Game\Domain\Card;
use App\Game\Domain\Section;
use App\Game\Domain\SectionAction;
use Illuminate\Support\Facades\Log;

final class GameStateLoader
{
    public function load(int $gameId): GameState
    {
        $game = Game::with([
            'cards.card.sections.actions'
        ])->findOrFail($gameId);
        return new GameState(
            id: $game->id,
            user_id: $game->user_id,
            seed: $game->seed,
            turn: $game->turn,
            total_stars: $game->total_stars,
            deck: $this->buildDeck($game)
        );
    }
    private function buildDeck(Game $game): Deck
    {
        $cards = $game->cards
            ->sortBy('position')
            ->map(fn($gameCard) => $this->buildCardState($gameCard))
            ->values()
            ->all();
        $deck = new Deck($cards);
        return new Deck($cards);
    }
    private function buildCardState($gameCard): CardState
    {
        $cardModel = $gameCard->card;

        $card = new Card(
            id: $cardModel->id,
            name: $cardModel->name,
            type: $cardModel->type
        );

        $sectionModel = $cardModel->sections
            ->firstWhere('section_number', $gameCard->section_active);

        if (!$sectionModel) {
            throw new \RuntimeException(
                "Section {$gameCard->section_active} not found for card {$cardModel->id}"
            );
        }

        $section = $this->buildSection($sectionModel);

        return new CardState(
            card_id: $card->id,
            position: $gameCard->position,
            section_active: $gameCard->section_active,
            resource_available: $gameCard->resource_available,
            card: $card,
            section: $section
        );
    }
    private function buildSection($section): Section
    {
        $actions = $section->actions
            ->map(fn($action) => new SectionAction(
                id: $action->id,
                type: $action->type,
                wood_cost: $action->wood_cost,
                fish_cost: $action->fish_cost,
                stone_cost: $action->stone_cost
            ))
            ->all();

        return new Section(
            id: $section->id,
            card_id: $section->card_id,
            section_number: $section->section_number,
            stars: $section->stars,
            improvements: $section->improvements,
            wood_resource: $section->wood_resource,
            fish_resource: $section->fish_resource,
            stone_resource: $section->stone_resource,
            actions: $actions
        );
    }
}
