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
            'postData'  => Post::where('category_id', $category->id)->whereNotNull('published_at')->with('category', 'author')->orderBy('published_at', 'desc')->paginate(5),
            'category'  => $category,
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Posts/Index', [
            'postData' => Post::whereNotNull('published_at')->with('category', 'author')->orderBy('published_at', 'desc')->paginate(10),
        ]);
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
            'content' => Post::where('slug', $slug)->with('category', 'author')->first(),
        ]);
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
     * @param User $user
     * @return Response
     */
    public function userIndex(User $author) : Response
    {
        return Inertia::render('Posts/Index', [
            'postData' => Post::where('user_id', $author->id)->whereNotNull('published_at')->with('category', 'author')->orderBy('published_at', 'desc')->paginate(5),
        ]);
    }
}
