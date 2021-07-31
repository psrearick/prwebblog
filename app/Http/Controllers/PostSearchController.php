<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostSearchController extends Controller
{
    public function index(Request $request) : Response
    {
        $authors     = User::has('posts');
        $categories  = Category::has('posts');
        $filters     = $request->input('filters') ?: [];
        $posts       = app(PostRepository::class)
            ->filteredPosts($filters)
            ->latest()
            ->paginate(10);

        return Inertia::render('Posts/Index', [
            'postData'      => $posts,
            'categories'    => $categories->get(),
            'category'      => array_key_exists('category', $filters) ? $categories->find($filters['category']) : null,
            'authors'       => $authors->get(),
            'author'        => array_key_exists('author', $filters) ? $authors->find($filters['author']) : null,
            'term'          => array_key_exists('post', $filters) ? $filters['post'] : null,
        ]);
    }
}
