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
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Category -->
                <div>
                    <label for="category_id" class="mb-1 block text-sm font-medium text-gray-700">
                        Category
                    </label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- From Date -->
                <div>
                    <label for="from_date" class="mb-1 block text-sm font-medium text-gray-700">
                        From Date
                    </label>
                    <input
                        type="date"
                        id="from_date"
                        name="from_date"
                        value="{{ request('from_date') }}"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2"
                    >
                </div>
                <!-- To Date -->
                <div>
                    <label for="to_date" class="mb-1 block text-sm font-medium text-gray-700">
                        To Date
                    </label>
                    <input
                        type="date"
                        id="to_date"
                        name="to_date"
                        value="{{ request('to_date') }}"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2"
                    >
                </div>
            </div>
            <!-- Buttons -->
            <div class="mt-6 flex gap-3">
                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2 text-white hover:bg-indigo-700"
                >
                    Apply Filters
                </button>
                <a
                    href="{{ route('expenses.index') }}"
                    class="rounded-lg bg-gray-500 px-5 py-2 text-white hover:bg-gray-600"
                >
                    Reset
                </a>
            </div>
        </form>
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
                    <th class="px-6 py-3 text-left font-semibold">Category</th>
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
                            {{ $expense->category->category_name }}
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