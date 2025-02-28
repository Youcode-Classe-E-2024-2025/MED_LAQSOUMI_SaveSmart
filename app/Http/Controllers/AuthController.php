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

    public function createUser()
    {
        if(request()->isMethod('get')) {
            return view('register');
        }
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
        if ($request->isMethod('get') && !$request->session()->has('user')) {
            return view('auth');
        } elseif ($request->isMethod('get') && $request->session()->has('user')) {
            $user = $request->session()->get('user');
            return view('profile');
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
        $request->session()->put('user', $user);
        $request->session()->put('name', $user->name);
        $request->session()->put('username', $user->username);
        $request->session()->put('email', $user->email);
        $request->session()->put('email_verified_at', $user->email_verified_at);
        $request->session()->put('remember_token', $user->remember_token);
        $request->session()->regenerate();

        return view('profile', ['user' => $user, 'name' => $user->name, 'username' => $user->username])->with('success', 'Welcome back '. $user->name);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('home');
    }
}
