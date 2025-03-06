<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{

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


    public function create()
    {
        $user = Auth::user();
        $profileCount = Profile::where('user_id', $user->id)->count();
        
        if ($profileCount >= 4) {
            return redirect()->route('profile.manage', ['id' => $user->id])
                ->with('error', 'You have reached the maximum limit of 4 profiles per account.');
        }
        
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $profileCount = Profile::where('user_id', $user->id)->count();
        
        if ($profileCount >= 4) {
            return redirect()->route('profile.manage', ['id' => $user->id])
                ->with('error', 'You have reached the maximum limit of 4 profiles per account.');
        }
        
        $profile = new Profile();
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->pin = $request->pin;
        $profile->avatar = $request->avatar;
        $profile->user_id = $user->id;
        $profile->save();
        return redirect()->route('profile', ['id' => $profile->id]);
    }

    public function show(string $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profile.profile', ['profiles' => $profiles]);
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profile.manage', ['profiles' => $profiles]);
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'pin' => 'required',
            'avatar' => 'required'
        ]);
        $profile = Profile::find($id);
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->pin = $request->pin;
        $profile->avatar = $request->avatar;
        $profile->save();
        return redirect()->route('profile.manage', ['id' => $profile->id])->with('success', 'Profile updated successfully');
    }

    
    public function destroy(string $id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('profile.manage', ['id' => $profile->id])->with('success', 'Profile deleted successfully');
    }
}
