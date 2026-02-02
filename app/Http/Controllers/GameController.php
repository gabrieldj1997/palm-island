<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Inertia\Inertia;

use App\Game\UseCases\CreateGame;
use App\Game\UseCases\DiscardCard;
use App\Game\UseCases\NextTurn;
use App\Game\UseCases\PurchaseCard;
use App\Game\UseCases\RotateCard;
use App\Game\UseCases\FlipCard;


class GameController extends Controller
{
    public function index(){
        return Inertia::render('GamePage');
    }
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
        return Inertia::render('Game/CardPage', [
            'cards' => $cards
        ]);
    }
}
