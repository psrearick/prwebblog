<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = Post::whereNotNull('published_at')
            ->with('category', 'author')
            ->orderBy('published_at', 'desc')
            ->latest()
            ->filter($request)
            ->paginate(10);

        return Inertia::render('Posts/Index', [
            'postData'      => $posts,
            'searchTerm'    => $request->get('post'),
            'category'      => null,
            'categories'    => Category::all(),
        ]);
    }
}
