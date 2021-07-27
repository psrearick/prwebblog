<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class RegisterController extends Controller
{
    public function create() : \Inertia\Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->all());
        auth()->login($user);

        return Redirect::route('home')->with('success', 'User Registered!');
    }
}
