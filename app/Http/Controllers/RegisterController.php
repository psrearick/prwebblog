<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class RegisterController extends Controller
{
    public function create(): \Inertia\Response
    {
        return Inertia::render('Register/Create');
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->all());
        return Redirect::route('home')->with('success', 'User Registered!');
    }
}
