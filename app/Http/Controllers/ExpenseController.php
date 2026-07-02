<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpenseStoreRequest;
use App\Http\Requests\ExpenseUpdateRequest;
use App\Models\Category;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::with('category')->where('user_id', Auth::id());

        if ($request->filled('search')) {
            $query->where('expense_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('expense_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        $expenses = $query->latest()->paginate(5)->withQueryString();

        $categories = Category::where('user_id', Auth::id())->orderBy('category_name')->get();
        
        return view('expenses.index', compact('expenses', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('expenses.create', compact('categories'));
    }

    public function store(ExpenseStoreRequest $request)
    {
        $validated = $request->validated();

        Expense::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'expense_name' => $request->expense_name,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully!');
    }

    public function show(Expense $expense)
    {        
        return redirect()->route('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        $categories = Category::where('user_id', Auth::id())->get();

        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(Expense $expense, ExpenseUpdateRequest $request)
    {
        $this->authorize('update', $expense);

        $validated = $request->validated();

        $expense->update([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'expense_name' => $request->expense_name,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
            'description' => $request->description
        ]);
        
        return redirect()->route('expenses.index')->with('success', 'Expense Updated Sucessfully!');
    }

    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense Deleted Successfully!');
    }
}
