<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $category_id = request()->query('category_id');
        $search_term = request()->query('search');
        if ($search_term) {
            $books = Book::where('title', 'LIKE', "%{$search_term}%")->with('category')->paginate(1);
        } elseif ($category_id) {
            $books = Book::where('category_id', $category_id)->with('category')->paginate(1);
        } else {
            $books = Book::with('category')->paginate(5);
        }



        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {


        $validated =  $request->validate([
            'title' => 'required',
            'author' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nbpages' => 'required',
            'resume' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }
        $validated['user_id'] = Auth::id();
        Book::create($validated);
        return redirect()->route('home')->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        // une requete pour permettre de rajouter 3 livres de la meme categorie
        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->take(3)
            ->get();

        $book->load('category');
        $book->relatedBooks = $relatedBooks;
        return view('books.show', compact('book'));
    }



    public function edit(Book $book, Request $request)
    {

        if ($request->user()->cannot('update', $book)) {
            abort(403);
        }
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        if ($request->user()->cannot('update', $book)) {
            abort(403);
        }
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nbpages' => 'required',
            'resume' => 'required',
            'price' => 'required',
        ]);

        $book->title = $data["title"];
        $book->author = $data["author"];
        $book->nbpages = $data["nbpages"];
        $book->resume = $data["resume"];
        $book->price = $data["price"];

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            // Delete the old photo if it exists
            if ($book->photo) {
                $oldPhotoPath = public_path('storage/' . $book->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            $book->photo = $photoPath;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book, Request $request)
    {
        // Delete the photo if it exists

        if ($request->user()->cannot('delete', $book)) {
            abort(403);
        }
        if ($book->photo) {
            $photoPath = public_path('storage/' . $book->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    //show register page

    //handle register request


}
