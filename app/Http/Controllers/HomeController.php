<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class HomeController extends Controller
{
        public function index() {
            // load caterories
            $categories = Category::all();
            // load last 3 books
             $books = Book::query()->orderBy('created_at', 'desc')->take(3)->get();
            return view('welcome', compact('categories', 'books'));
        }
}

