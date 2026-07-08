<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    public const int BEGINNER = 1;
    public const int INTERMEDIATE = 2;
    public const int ADVANCED = 3;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'order',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
