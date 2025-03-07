<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('category')->get();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction->load('category'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return response()->json($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(null, 204);
    }
}