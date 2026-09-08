<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function index()
    {
        $budget = Budget::where('user_id', Auth::id())
            ->where('month', now()->month)
            ->where('year', now()->year)
            ->first();

        $expensesIncurred = Expense::where('user_id', Auth::id())
            ->whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year)
            ->sum('amount');

        $remainingBudget = ($budget?->amount ?? 0) - $expensesIncurred;
        
        return view('budget.index', compact('budget', 'expensesIncurred', 'remainingBudget'));
    }

    public function create()
    {
        $budgetExists = Budget::where('user_id', Auth::id())
            ->whereMonth('month', now()->month)
            ->whereYear('year', now()->year)
            ->exists();

        return view('budget.create', compact('budgetExists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01']
        ]);

        $budgetExists = Budget::where('user_id', Auth::id())
            ->where('month', now()->month)
            ->where('year', now()->year)
            ->exists();

        if ($budgetExists) {
            return back()->withErrors([
                'budget' => 'Budget for this month has already been added!'
            ]);
        }

        Budget::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'month' => now()->month,
            'year' => now()->year
        ]);

        return redirect()->route('budget.index')->with('success', 'Budget Added Successfully!');
    }

    public function edit(Budget $budget)
    {
        $this->authorize('update', $budget);

        return view('budget.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        $this->authorize('update', $budget);
        
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01']
        ]);

        $budget->update([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'month' => now()->month,
            'year' => now()->year
        ]);

        return redirect()->route('budget.index')->with('success', 'Budget Edited Successfully!');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();

        return redirect()->route()->with('success', 'Budget Deleted Successfully!');
    }
}
