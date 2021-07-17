<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, string $searchTerm) : void
    {
        $searchTerm = str_replace(' ', '%', $searchTerm);
        $query
            ->where('body', 'like', '%' . $searchTerm . '%')
            ->orWhere('title', 'like', '%' . $searchTerm . '%');
    }
}
