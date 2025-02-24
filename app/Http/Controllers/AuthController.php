<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function createUser()
    {
        $validated = request()->validate([
            'username' => 'required|string|unique:users|max:55|min:3',
            'name' => 'required|string|max:55|min:3',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $validated['email_verified_at'] = now();
        $validated['remember_token'] = Str::random(54);
        $user = User::create($validated);
        return response()->json($user);
    }
    
}
