<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::where('user_id', Auth::id());

        if ($request->filled('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }
        $categories = $query->get();
        // $categories = auth()->user()->categories();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => [
                'required', 
                'string', 
                Rule::unique('categories')
                    ->where(fn ($query) => $query->where('user_id', Auth::id()))
            ]
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => [
                'required', 
                'string', 
                'max:255',
                Rule::unique('categories', 'category_name')
                    ->where(fn ($query) => $query->where('user_id', Auth::id()))
                    ->ignore($category->id),
            ]
        ]);

        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
