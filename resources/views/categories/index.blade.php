@extends('layouts.app')

@section('title', 'View Categories')

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
        <div class="flex justify-between">
            <h4 class="text-2xl font-semibold m-3 p-3">
                View Categories
            </h4>
            <a 
                href="{{ route('categories.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white m-3 p-3 rounded"
            >
                Add Category
            </a>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border">
                    <th class="px-6 py-3 text-left bg-gray-50">Category Name</th>
                    <th class="px-6 py-3 text-left bg-gray-50">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border">
                        <td class="px-6 py-3">
                            {{ $category->category_name }}
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex gap-2">
                                <a 
                                    href="{{ route('categories.edit', $category) }}"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white p-3 rounded"
                                >
                                    Edit
                                </a>
                                <form 
                                    action="{{ route('categories.destroy', $category) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit" 
                                        class="bg-red-600 hover:bg-red-700 text-white p-3 rounded"   
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
    </div>
@endsection