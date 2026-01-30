<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    public function run(): void
    {
        $this->createNormalCards();
        $this->createEndTurnCard();
    }
    public function createNormalCards(): void
    {
        if (Card::where('type', 'normal')->count() >= 16) {
            return;
        }
        $cards = [
            ['name' => 'Pescaria', 'type' => 'normal'],
            ['name' => 'Pescaria', 'type' => 'normal'],
            ['name' => 'Pescaria', 'type' => 'normal'],
            ['name' => 'Madereira', 'type' => 'normal'],
            ['name' => 'Madereira', 'type' => 'normal'],
            ['name' => 'Madereira', 'type' => 'normal'],
            ['name' => 'Mina', 'type' => 'normal'],
            ['name' => 'Mina', 'type' => 'normal'],
            ['name' => 'Mina', 'type' => 'normal'],
            ['name' => 'Mercado', 'type' => 'normal'],
            ['name' => 'Feira', 'type' => 'normal'],
            ['name' => 'Comercio', 'type' => 'normal'],
            ['name' => 'Vila', 'type' => 'normal'],
            ['name' => 'Vila', 'type' => 'normal'],
            ['name' => 'Igreja', 'type' => 'normal'],
            ['name' => 'Igreja', 'type' => 'normal'],
        ];
        Card::insert($cards);
    }
    public function createEndTurnCard(): void
    {
        if (Card::where('type', 'end_turn')->exists()) {
            return;
        }
        Card::create([
            'name' => 'Turno',
            'type' => 'end_turn',
        ]);
    }
}
