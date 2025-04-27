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
        $books = Book::all();
       // dd($books);
        return view('books.index', compact('books'));
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
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nbpages' => 'required',
            'resume' => 'required',
            'price' => 'required',
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->nbpages = $request->nbpages;
        $book->resume = $request->resume;
        $book->price = $request->price;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $book->photo = $photoPath;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    //show register page

    //handle register request


}
