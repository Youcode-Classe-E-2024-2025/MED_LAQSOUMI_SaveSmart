<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Transaction;
use Illuminate\Http\Request;;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = Auth::user();
        if (!$users) {
            return redirect()->route('login.user')->with('error', 'Please login to continue!');
        }
        
        $profiles = Profile::where('user_id', $users->id)->get();
        $selectedProfile = Profile::findOrFail($profiles[0]->id);
        $categories = Category::select('name', 'color')->distinct()->get();
        $transactions = Transaction::with('category')->get();
        $recentTransactions = Transaction::with('category')->latest()->limit(5)->get();
        
        return view('dashboard.index', compact('profiles', 'selectedProfile', 'categories', 'transactions', 'recentTransactions'));
    }
}
