<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Inertia\Inertia;

class GameController extends Controller
{
    public function getCard(Card $card)
    {
        $card->load(['sections.actions']);

        return Inertia::render('Game/CardPage', [
            'cards' => [$card]
        ]);
    }
    public function getAllCards()
    {
        $cards = Card::with(['sections.actions'])->get();
        return Inertia::render('Game/DeckPage', [
            'cards' => $cards
        ]);
    }
}
