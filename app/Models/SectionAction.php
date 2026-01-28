<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class SectionAction extends Model
{
    protected $table = 'tb_section_actions';
    public $timestamps = false;

    protected $fillable = [
        'section_id',
        'type',
        'wood_cost',
        'fish_cost',
        'stone_cost',
    ];

    protected $casts = [
        'section_id' => 'integer',
        'type' => 'integer',
        'wood_cost' => 'integer',
        'fish_cost' => 'integer',
        'stone_cost' => 'integer',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
