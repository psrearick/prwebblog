<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Home/Index', [
            'posts' => Post::with(['category', 'author'])->whereNotNull('published_at')->get()->sortByDesc('published_at')->values()->take(8),
        ]);
    }
}
