<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'name' => 'required|string|unique:categories',
            'description' => 'nullable|string',
            'color' => 'nullable|string',
        ]);
        
        $categories = Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'color' => $request['color'], // Default color if not provided
        ]);
        $categories->save();
        return redirect()->route('dashboard')->with('success', 'Category created successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard')->with('success', 'Category deleted successfully');
    }
}