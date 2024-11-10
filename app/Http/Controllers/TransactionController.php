<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
{
    // Get the transactions for the authenticated user
    $transactions = Transaction::where('user_id', Auth::id())->orderBy('date', 'desc')->get();

    // Pass transactions to the view
    return view('transaction_list', compact('transactions'));
}

public function create()
{
    return view('transaction_create');
}

public function store(Request $request)
{

        // Validate the request data
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'destination' => 'required|in:bank,cash',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

         // Create the transaction with the authenticated user's ID
         Transaction::create([
            'user_id' => Auth::id(),
            'description' => $validated['description'],
            'type' => $validated['type'],
            'destination' => $validated['destination'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
        ]);
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');

}

}
