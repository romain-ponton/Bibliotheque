<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin.index', compact('admin'));
    }


    public function get_users()
    {
        // Fetch all users from the database
        $users = User::query()->paginate(15);

        // counnt the number of users
        $count = User::query()->count();

        // Return the view with the users data
        return view('admin.users', compact('users', 'count'));
    }

    public function edit_users(User $user)
    {
        return view('admin.edit_users', compact('user'));
    }

    public function update_users(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        // Update the user
        $user->update($request->only('name', 'email', 'role'));

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroy_users(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with success message
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }



    public function get_books()
    {
        // Fetch all books from the database // load categories
        $books = Book::query()->with('category')->paginate(15);

        // counnt the number of books
        $count = Book::query()->count();

        // Return the view with the books data
        return view('admin.books', compact('books', 'count'));
    }
    public function edit_books(Book $book)
    {
        return view('admin.edit_books', compact('book'));
    }
    public function update_books(Request $request, Book $book)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_at' => 'required|date',
        ]);

        // Update the book
        $book->update($request->only('title', 'author', 'description', 'published_at'));

        // Redirect back with success message
        return redirect()->route('admin.books')->with('success', 'Book updated successfully.');
    }
    public function destroy_books(Book $book)
    {
        // Delete the book
        $book->delete();

        // Redirect back with success message
        return redirect()->route('admin.books')->with('success', 'Book deleted successfully.');
    }

    public function create_books()
    {
        return view('admin.create_books');
    }
    public function store_books(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_at' => 'required|date',
        ]);

        // Create a new book
        Book::create($request->only('title', 'author', 'description', 'published_at'));

        // Redirect back with success message
        return redirect()->route('admin.books')->with('success', 'Book created successfully.');
    }
}
