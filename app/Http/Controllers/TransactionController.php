<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
        ]);
        
        $transaction = Transaction::create([
            'profile_id' => $request['profile_id'],
            'category_id' => $request['category_id'],
            'amount' => $request['amount'],
            'description' => $request['description'],
            'transaction_date' => $request['transaction_date'],
        ]);
        $transaction->save();
        return redirect()->route('dashboard')->with('success', 'Transaction created successfully');
    }
}