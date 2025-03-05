<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $auth = Auth::check();
        if ($auth) {
            $user = Auth::user();
            $profile = Profile::where('user_id', $user->id)->first();
            if ($profile) {
                return redirect()->route('profile', ['id' => $profile->id]);
            } else {
                return redirect()->route('profile.create');
            }
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $profile = new Profile();
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->pin = $request->pin;
        $profile->avatar = $request->avatar;
        $profile->user_id = $user->id;
        $profile->save();
        return redirect()->route('profile', ['id' => $profile->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        // Get all profiles for the user instead of just one
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profile.profile', ['profiles' => $profiles]);
    }

    /**
     * Show the form for editing the specified resource.familyMembers
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profile.manage', ['profiles' => $profiles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
