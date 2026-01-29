<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Section extends Model
{
    protected $connection = 'game_db';
    protected $table = 'tb_sections';
    public $timestamps = false;

    protected $fillable = [
        'card_id',
        'section_number',
        'stars',
        'improvements',
        'wood_resource',
        'fish_resource',
        'stone_resource',
    ];

    protected $casts = [
        'card_id' => 'integer',
        'section_number' => 'integer',
        'stars' => 'integer',
        'improvements' => 'integer',
        'wood_resource' => 'integer',
        'fish_resource' => 'integer',
        'stone_resource' => 'integer',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
    public function actions()
    {
        return $this->hasMany(SectionAction::class);
    }
}
