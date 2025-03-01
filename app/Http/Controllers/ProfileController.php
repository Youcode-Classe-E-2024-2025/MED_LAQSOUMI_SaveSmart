<?php

namespace App\Http\Controllers;

use App\Models\FamilyAccount;
use App\Models\FamilyMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            // $family = FamilyAccount::where('id', $user->id)->first();
            $familyAccountId = FamilyMember::where('user_id', $user->id)->first();
            $familyMembers = FamilyMember::where('family_account_id', $familyAccountId)->get();
            // $family = FamilyAccount::where('id', $familyMembers->family_account_id)->first();
            return view('profile.profile', ['user' => $user, 'familyMembers' => $familyMembers]);
        }else {
            return redirect()->route('login.user');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
