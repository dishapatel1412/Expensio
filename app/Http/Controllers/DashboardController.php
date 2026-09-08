<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Expense;

class DashboardController extends Controller
{
    public function index()
    {
        $recentExpenses = Expense::with('category')->where('user_id', Auth::id())->latest()->limit(5)->get();
        $totalExpenses = Expense::where('user_id', Auth::id())->sum('amount');
        $currentMonthExpenses = Expense::where('user_id', Auth::id())->whereMonth('expense_date', now()->month)->sum('amount');
        $countExpenses = Expense::where('user_id', Auth::id())->count();
        $totalByCategory = Expense::with('category')
            ->where('user_id', Auth::id())
            ->selectRaw('category_id, SUM(amount) as total_amount')
            ->groupBy('category_id')
            ->get();
        $monthlySpendings = Expense::where('user_id', Auth::id())
            ->selectRaw('MONTH(expense_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard', 
            compact(
                'recentExpenses', 
                'totalExpenses', 
                'currentMonthExpenses', 
                'countExpenses', 
                'totalByCategory',
                'monthlySpendings'
            )
        );
    }
}
