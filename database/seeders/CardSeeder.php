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
            ['name' => 'canoaria', 'type' => 'normal'],
            ['name' => 'canoaria', 'type' => 'normal'],
            ['name' => 'canoaria', 'type' => 'normal'],
            ['name' => 'madereira', 'type' => 'normal'],
            ['name' => 'madereira', 'type' => 'normal'],
            ['name' => 'madereira', 'type' => 'normal'],
            ['name' => 'pedreira', 'type' => 'normal'],
            ['name' => 'pedreira', 'type' => 'normal'],
            ['name' => 'pedreira', 'type' => 'normal'],
            ['name' => 'mercado', 'type' => 'normal'],
            ['name' => 'posto comercial', 'type' => 'normal'],
            ['name' => 'ferramentaria', 'type' => 'normal'],
            ['name' => 'habitação', 'type' => 'normal'],
            ['name' => 'habitação', 'type' => 'normal'],
            ['name' => 'templo', 'type' => 'normal'],
            ['name' => 'templo', 'type' => 'normal'],
        ];
        Card::insert($cards);
    }
    public function createEndTurnCard(): void
    {
        if (Card::where('type', 'end_turn')->exists()) {
            return;
        }
        Card::create([
            'name' => 'turno',
            'type' => 'end_turn',
        ]);
    }
}
