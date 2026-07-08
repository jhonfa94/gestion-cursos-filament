<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $fillable = [
        'module_id',
        'title',
        'slug',
        'content',
        'video_url',
        'duration_minutes',
        'order',
        'is_free',
    ];

    protected function casts(): array
    {
        return [
            'is_free' => 'boolean',
        ];
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
