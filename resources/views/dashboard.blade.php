@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 m-3">
        Welcome {{ auth()->user()->name }} <br>
    </h2>
    <span class="text-xl m-3">Here's your expense overview.</span>
    <div class="flex gap-3 m-3">
        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    Total Expenses
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                ₹{{ number_format($totalExpenses, 0) }}
            </h3>
        </div>

        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    Monthly Spending
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                ₹{{ number_format($currentMonthExpenses, 0) }}
            </h3>
        </div>

        <div class="w-64 border border-gray-300 rounded-xl p-5">
            <div class="h-14 flex items-start">
                <span class="text-xl">
                    Expense Count
                </span>
            </div>
            <h3 class="p-3 text-2xl font-bold">
                {{ $countExpenses }}
            </h3>
        </div>
    </div>
    <div class="flex gap-3 m-3">
        <div class="w-96 border border-gray-300 rounded-xl m-3 p-5">
            <div class="mb-4">
                <span class="text-xl">
                    Spending By Category
                </span>
            </div>
            <ul class="space-y-3">
                @foreach ($totalByCategory as $category)
                    <li class="flex items-center justify-between gap-8">
                        <span class="text-lg">
                            {{ $category->category->category_name }}
                        </span>
                        <span class="text-lg font-semibold">
                            ₹{{ number_format($category->total_amount, 0) }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-96 border border-gray-300 rounded-xl m-3 p-5">
            <div class="mb-4">
                <span class="text-xl">
                    Monthly Spending
                </span>
            </div>
            <ul class="space-y-3">
                @foreach ($monthlySpendings as $spending)
                    <li class="flex items-center justify-between gap-8">
                        <span class="text-lg font-semibold">
                            {{ Carbon\Carbon::create()->month($spending->month)->format('F') }} - ₹{{ $spending->total }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="w-full border border-gray-300 rounded-xl m-3 p-5">
        <div class="flex justify-between mb-4">
            <span class="text-xl m-3">
                Recent Expenses
            </span>
            <a href="{{ route('expenses.index') }}" class="m-3">View More Expenses -></a>
        </div>
        <table class="w-full overflow-hidden rounded-lg border border-gray-300">
            <thead class="bg-gray-50">
                <tr class="border">
                    <th class="px-6 py-3 text-left font-semibold">Expense Name</th>
                    <th class="px-6 py-3 text-left font-semibold">Amount</th>
                    <th class="px-6 py-3 text-left font-semibold">Category</th>
                    <th class="px-6 py-3 text-left font-semibold">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentExpenses as $expense)
                    <tr class="border">
                        <td class="px-6 py-3">
                            {{ $expense->expense_name }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $expense->amount }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $expense->category->category_name }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $expense->expense_date }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection