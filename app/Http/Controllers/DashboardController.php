<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Transaction;
use Illuminate\Http\Request;;

class DashboardController extends Controller
{
    public function dashboard($id){
        $users = Auth::user();
        if (!$users) {
            return redirect()->route('login.user')->with('error', 'Please login to continue!');
        }
        
        $profiles = Profile::where('user_id', $users->id)->get();
        $selectedProfile = Profile::findOrFail($id);
        $categories = Category::select('name', 'color')->distinct()->get();
        $transactions = Transaction::with('category')->get();
        
        return view('dashboard.index', compact('profiles', 'selectedProfile', 'categories', 'transactions'));
    }
}
