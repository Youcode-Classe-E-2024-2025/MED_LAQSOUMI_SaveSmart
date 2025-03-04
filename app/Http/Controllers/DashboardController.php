<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = Auth::user();
        if (!$users) {
            return redirect()->route('login.user')->with('error', 'Please login to continue!');
        }
        $profile = Profile::where('user_id', $users->id)->first();
        return view('dashboard.index', ['user' => $profile]);
    }
}
