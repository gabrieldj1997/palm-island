<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class Card extends Model
{
    use HasFactory;
    protected $table = 'tb_cards';
    public $timestamps = false;
    public const NORMAL = 'normal';
    public const TYPE_END_TURN = 'end_turn';

    protected $fillable = [
        'name',
        'type',
    ];

    protected $casts = [
        'name' => 'string',
        'type' => 'string',
    ];

    public function gameCards(): HasMany
    {
        return $this->hasMany(GameCard::class, 'card_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function isEndTurn(): bool
    {
        return $this->type === self::TYPE_END_TURN;
    }
}
