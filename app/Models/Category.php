<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName() : string
    {
        return 'name';
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
