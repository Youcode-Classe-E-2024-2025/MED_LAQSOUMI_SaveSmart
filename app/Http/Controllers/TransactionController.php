<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Profile;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $profiles = Profile::all();
        $categories = Category::all();
        return view('dashboard.transactions', compact('transactions', 'categories', 'profiles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
            'type' => 'required|in:income,expense',
        ]);
        
        // Handle the amount based on transaction type
        if ($validated['type'] == 'expense') {
            $validated['amount'] = -abs($validated['amount']);
        }
        
        $transaction = Transaction::create([
            'user_id' => $validated['user_id'],
            'profile_id' => $request->input('profile_id'),
            'category_id' => $validated['category_id'],
            'title' => $validated['description'], // Map description to title
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'date' => $validated['transaction_date'],
            'type' => $validated['type'],
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Transaction created successfully');
    }
    
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.edit_transaction', compact('transaction', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
            'type' => 'required|in:income,expense',
        ]);
        
        // Handle the amount based on transaction type
        if ($validated['type'] == 'expense') {
            $validated['amount'] = -abs($validated['amount']);
        } else {
            $validated['amount'] = abs($validated['amount']);
        }
        
        $transaction->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['description'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'date' => $validated['transaction_date'],
            'type' => $validated['type'],
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Transaction updated successfully');
    }
    
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        
        return redirect()->route('dashboard')->with('success', 'Transaction deleted successfully');
    }
}