<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function showRegister()
    {
        return view('auth');
    }

    public function showLogin()
    {
        return view('auth');
    }

    public function createUser()
    {
        $validated = request()->validate([
            'username' => 'required|string|unique:users|max:55|min:3',
            'name' => 'required|string|max:55|min:3',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['remember_token'] = Str::random(10);
        $session = User::create($validated);
        return redirect()->route('login.user', $session)->with('success', 'Account created successfully! Please login to continue.');
    }

    public function loginUser(Request $request)
    {   
        if ($request->isMethod('get') && Auth::check()) {
            return redirect()->route('profile');
        }elseif ($request->isMethod('get') && !Auth::check()) {
            return redirect()->route('login.user');
        }

        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return redirect()->back()->with('error', 'Invalid login details!');
        }
        Auth::login($user);
        return redirect()->route('profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.user')->with('success', 'Logout successful!');
    }
}
