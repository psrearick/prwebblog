<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $query, Request $request) : void
    {
        if ($searchTerm = $request->get('post')) {
            $searchTerm = str_replace(' ', '%', $searchTerm);
            $query
                ->where(function ($query) use ($searchTerm) {
                    $query
                        ->where('body', 'like', '%' . $searchTerm . '%')
                        ->orWhere('title', 'like', '%' . $searchTerm . '%');
                });
        }

        if ($categoryId = $request->get('category')) {
            $query->where('category_id', $categoryId);
        }
    }
}
