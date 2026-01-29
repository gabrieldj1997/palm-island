<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Game extends Model
{
    protected $connection = 'game_db';
    protected $table = 'tb_games';

    protected $fillable = [
        'user_id',
        'seed',
        'turn',
        'total_stars',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'seed' => 'integer',
        'turn' => 'integer',
        'total_stars' => 'integer',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(GameCard::class, 'game_id');
    }

    public function gameCards(): HasMany
    {
        return $this->hasMany(GameCard::class, 'game_id');
    }

    public function advanceTurn(): void
    {
        $this->turn += 1;
        $this->save();
    }
}
