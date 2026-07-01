@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
    <div class="container mx-auto">
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
        <h4 class="text-2xl font-semibold mt-10 p-3">
            Edit Expenses
        </h4>
        <form action="{{ route('expenses.update', $expense) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="m-3">
                <label 
                    for="category_id"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Category:
                </label>
                <select 
                    name="category_id" 
                    id="category_id"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2"
                >
                    <option value="select">Select</option>
                    @forelse($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->category_name }}
                        </option>
                    @empty
                        <span>No Categories Found!</span>                    
                    @endforelse
                </select>
            </div>
            <div class="m-3">
                <label 
                    for="expense_name"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Name:
                </label>
                <input 
                    type="text" 
                    name="expense_name" 
                    id="expense_name"
                    placeholder="Enter Expense Name"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                    value="{{ old('expense_name', $expense->expense_name) }}"
                >
            </div>
            <div class="m-3">
                <label 
                    for="amount"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Amount:
                </label>
                <input 
                    type="number" 
                    name="amount" 
                    id="amount"
                    placeholder="Enter Amount"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2"
                    value="{{ old('amount', $expense->amount) }}"
                >
            </div>
            <div class="m-3">
                <label 
                    for="expense_date"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Date:
                </label>
                <input 
                    type="date" 
                    name="expense_date" 
                    id="expense_date"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2"
                    value="{{ old('expense_date', $expense->expense_date) }}"
                >
            </div>
            <div class="m-3">
                <label 
                    for="description"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Description:
                </label>
                <textarea 
                    name="description" 
                    id="description" 
                    cols="30" 
                    rows="5"
                    placeholder="Describe Your Expense Here"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2"
                >{{ old('description', $expense->description)  }}</textarea>
            </div>
            <div class="m-3">
                <button 
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white w-full p-3 rounded"
                >
                    Save
                </button>
                <a 
                    class="block text-center underline text-sm text-gray-600 hover:text-gray-900 m-3" 
                    href="{{ route('expenses.index') }}"
                >
                    <span>Back</span>
                </a>
            </div>
        </form>
    </div>
@endsection