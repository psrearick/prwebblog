<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class SessionsController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();
        return Redirect::route('home')->with('success', 'You Have Logged Out');
    }

    public function store(LoginRequest $request) : RedirectResponse
    {
        if (auth()->attempt($request->all())) {
            session()->regenerate();
            return Redirect::route('home')->with('success', 'You Have Logged In');
        }

        return Redirect::back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }
}
