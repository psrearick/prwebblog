<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * @param Category $category
     * @return Response
     */
    public function categoryIndex(Category $category) : Response
    {
        return Inertia::render('Posts/Index', [
            'post_data' => Post::where('category_id', $category->id)->whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(5),
            'category'  => $category,
        ]);
    }

    /**
     * @param User $user
     * @return Response
     */
    public function userIndex(User $user) : Response
    {
        return Inertia::render('Posts/Index', [
            'post_data' => Post::where('user_id', $user->id)->whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Posts/Index', [
            'post_data' => Post::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     * @throws Exception
     */
    public function show(string $slug) : Response
    {
        return Inertia::render('Posts/Show', [
            'content' => Post::where('slug', $slug)->with('category', 'user')->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
