<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $books = Book::where('title', 'LIKE', "%{$query}%")->get();
    return view('books.index', compact('books'));
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
    ]);
    Category::create($request->all());
    return redirect()->route('categories.index');
}

public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $request->validate([
        'name' => 'required',
    ]);
    $category->update($request->all());
    return redirect()->route('categories.index');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('categories.index');
}
}
