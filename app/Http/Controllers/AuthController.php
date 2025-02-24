<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

    public function loginUser()
    {
        $validated = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $userName = $user->username;
        $name = $user->name;
        $email = $user->email;
        $created_at = $user->created_at;
        $updated_at = $user->updated_at;
        request()->session()->put('user', compact('userName', 'name', 'email', 'created_at', 'updated_at'));
        return view('dashboard.index', compact('userName', 'name', 'email', 'created_at', 'updated_at'));
    }

    public function logoutUser()
    {   
        $user = User::where('email', request()->email)->first();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $logout = User::destroy($user->id);
        return response()->json(['message' => 'Logged out'], 200);
    }
}
