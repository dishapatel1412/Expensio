@extends('layouts.app')

@section('title', 'Budget Overview')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-gray-800">
            Budget Overview
        </h2>
        <div class="flex gap-3">
            @if ($budget)
                <button
                    type="button"
                    disabled
                    class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed"
                >
                    Budget Already Added
                </button>
            @else
                <a
                    href="{{ route('budget.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded"
                >
                    Create Budget
                </a>
            @endif
            @if ($budget)
                <a 
                    href="{{ route('budget.edit', $budget) }}"
                    class="rounded-lg bg-indigo-600 px-5 py-2 text-white font-medium hover:bg-indigo-700 transition shadow-sm"
                >
                    Edit Budget
                </a>
            @endifgit 
        </div>
    </div>
    <div class="flex gap-3 m-3">
        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    This Month's Budget:
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                ₹{{ number_format($budget->amount ?? 0, 0) }}
            </h3>
        </div>
        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    Expense Count
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                ₹{{ number_format($expensesIncurred, 0) }}
            </h3>
        </div>
        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    Remaining Budget
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                ₹{{ number_format($remainingBudget, 0) }}
            </h3>
        </div>
    </div>    
@endsection