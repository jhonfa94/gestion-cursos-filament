<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    public const int ADMIN = 1;
    public const int INSTRUCTOR = 2;
    public const int AUTHOR = 3;
    public const int STUDENT = 4;

    protected $fillable = [
        'name',
        'display_name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
