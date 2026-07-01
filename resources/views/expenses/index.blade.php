@extends('layouts.app')

@section('title', 'View Expenses')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4">
                <ul class="list-disc pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('expenses.index') }}" method="GET" class="mb-6">
            <div class="flex items-center gap-3">
                <input 
                    type="text"
                    name="search"
                    class="flex-1 rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Search Expense"
                    value="{{ request('search') }}"
                >
                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2 text-white font-medium hover:bg-indigo-700 transition"
                >
                    Search
                </button>
                <a 
                    href="{{ route('expenses.index') }}"
                    class="rounded-lg bg-gray-500 px-5 py-2 text-white font-medium hover:bg-gray-600 transition"
                >
                    Reset
                </a>
            </div>
        </form>

        </div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">
                View Expenses
            </h2>
            <a 
                href="{{ route('expenses.create') }}"
                class="rounded-lg bg-indigo-600 px-5 py-2 text-white font-medium hover:bg-indigo-700 transition shadow-sm"
            >
                Add Expense
            </a>
        </div>
        <table class="w-full overflow-hidden rounded-lg border border-gray-200">
            <thead class="bg-gray-50">
                <tr class="border">
                    <th class="px-6 py-3 text-left font-semibold">Expense Name</th>
                    <th class="px-6 py-3 text-left font-semibold">Amount</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr class="border">
                        <td class="px-6 py-3">
                            <a 
                                href="{{ route('expenses.show', $expense) }}"
                                
                            >
                                {{ $expense->expense_name }}
                            </a>
                        </td>
                        <td class="px-6 py-3">
                            {{ $expense->amount }}
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex gap-2">
                                <a 
                                    href="{{ route('expenses.edit', $expense) }}"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700"
                                >
                                    Edit
                                </a>
                                <form 
                                    action="{{ route('expenses.destroy', $expense) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit" 
                                        class="rounded-md bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-700"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $expenses->links() }}
        </div>
    </div>
@endsection