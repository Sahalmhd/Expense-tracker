<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total income and expenses for pie chart
        $totalIncome = Transaction::where('user_id', $userId)->where('type', 'income')->sum('amount');
        $totalExpenses = Transaction::where('user_id', $userId)->where('type', 'expense')->sum('amount');

        // Monthly income and expenses for line and bar charts
        $monthlyIncome = [];
        $monthlyExpenses = [];
        $months = [];
        
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('F');
            
            $income = Transaction::where('user_id', $userId)
                ->where('type', 'income')
                ->whereMonth('date', $month->month)
                ->whereYear('date', $month->year)
                ->sum('amount');
            $monthlyIncome[] = $income;

            $expense = Transaction::where('user_id', $userId)
                ->where('type', 'expense')
                ->whereMonth('date', $month->month)
                ->whereYear('date', $month->year)
                ->sum('amount');
            $monthlyExpenses[] = $expense;
        }

        // Reverse arrays for chronological order
        $monthlyIncome = array_reverse($monthlyIncome);
        $monthlyExpenses = array_reverse($monthlyExpenses);
        $months = array_reverse($months);

        return view('transaction_report', compact('totalIncome', 'totalExpenses', 'monthlyIncome', 'monthlyExpenses', 'months'));
    }
}

