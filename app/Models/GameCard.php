<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class GameCard extends Model
{
    protected $connection = 'game_db';
    protected $table = 'tb_game_cards';
    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'card_id',
        'position',
        'section_active',
        'resource_available',
    ];

    protected $casts = [
        'game_id' => 'integer',
        'card_id' => 'integer',
        'position' => 'integer',
        'section_active' => 'integer',
        'resource_available' => 'boolean',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
