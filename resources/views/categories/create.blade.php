@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="container-md mx-auto">
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
            Create Category
        </h4>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="m-3">
                <label 
                    for="category_name"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Name:
                </label>
                <input 
                    type="text" 
                    name="category_name" 
                    id="category_name"
                    placeholder="Enter Category Name"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
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
                    href="{{ route('categories.index') }}"
                >
                    <span>Back</span>
                </a>
            </div>
        </form>
    </div>
@endsection