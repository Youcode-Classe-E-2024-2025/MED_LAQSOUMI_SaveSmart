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

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('dashboard')->with('success', 'Category deleted successfully');
    }


    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|unique:categories,name,' . $id,
        'description' => 'nullable|string',
        'color' => 'nullable|string',
    ]);
    
    $category = Category::find($id);
    $category->name = $request->input('name');
    $category->description = $request->input('description');
    $category->color = $request->input('color');
    $category->save();
    
    return redirect()->route('dashboard')->with('success', 'Category updated successfully');
}
}