<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Calculate total income and expenses
        $totalIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpenses = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');

        // Calculate bank balance
        $bankIncome = Transaction::where('user_id', $userId)
            ->where('destination', 'bank')
            ->where('type', 'income')
            ->sum('amount');

        $bankExpenses = Transaction::where('user_id', $userId)
            ->where('destination', 'bank')
            ->where('type', 'expense')
            ->sum('amount');

        $bankBalance = $bankIncome - $bankExpenses;

        // Calculate cash in hand
        $cashIncome = Transaction::where('user_id', $userId)
            ->where('destination', 'cash')
            ->where('type', 'income')
            ->sum('amount');

        $cashExpenses = Transaction::where('user_id', $userId)
            ->where('destination', 'cash')
            ->where('type', 'expense')
            ->sum('amount');

        $cashInHand = $cashIncome - $cashExpenses;

        // Get recent transactions, ordered by date
        $recentTransactions = Transaction::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->take(10)
            ->get();

        return view('dashboard', compact('totalIncome', 'totalExpenses', 'bankBalance', 'cashInHand', 'recentTransactions'));
    }
}
