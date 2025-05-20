<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, "index"])->name("home");


// *** auth routes

Route::get('/register', [AuthController::class, "register"])->name("register")->middleware("guest");
Route::post('/register', [AuthController::class, "handleRegister"])->name("register.post")->middleware("guest");
Route::get('/login', [AuthController::class, "login"])->name("login")->middleware("guest");
Route::post('/login', [AuthController::class, "handleLogin"])->name("login.post")->middleware("guest");
Route::delete('/logout', [AuthController::class, "logout"])->name("logout")->middleware("auth");

// *** BOOKS ROUTES ***

Route::get('/books', [BookController::class, "index"])->name("books.index")->middleware("auth");
Route::get('/books/create', [BookController::class, "create"])->name("books.create")->middleware("auth");
Route::post('/books/store', [BookController::class, "store"])->name("books.store")->middleware("auth");
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show')->middleware("auth");
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware("auth");
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update')->middleware("auth");
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware("auth");


// *** ADMIN ROUTES ***

// auth middleware and role middleware

Route::get('/admin', [AdminController::class, "index"])->name("admin.index")->middleware("auth", "admin:admin");
Route::get('/admin/users', [AdminController::class, "get_users"])->name("admin.users")->middleware("auth", "admin:admin");

// edit and update and destroy user
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit_users'])->name('admin.users.edit')->middleware("auth", "admin:admin");
Route::put('/admin/users/{user}', [AdminController::class, 'update_users'])->name('admin.users.update')->middleware("auth", "admin:admin");
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy_users'])->name('admin.users.destroy')->middleware("auth", "admin:admin");

// *** display books for admin edit, update, destroy create, store ***
Route::get('/admin/books', [AdminController::class, "get_books"])->name("admin.books")->middleware("auth", "admin:admin");
Route::get('/admin/books/create', [AdminController::class, "create_books"])->name("admin.books.create")->middleware("auth", "admin:admin");
Route::post('/admin/books/store', [AdminController::class, "store_books"])->name("admin.books.store")->middleware("auth", "admin:admin");
Route::get('/admin/books/{book}/edit', [AdminController::class, 'edit_books'])->name('admin.books.edit')->middleware("auth", "admin:admin");
Route::put('/admin/books/{book}', [AdminController::class, 'update_books'])->name('admin.books.update')->middleware("auth", "admin:admin");
Route::delete('/admin/books/{book}', [AdminController::class, 'destroy_books'])->name('admin.books.destroy')->middleware("auth", "admin:admin");
Route::get('/admin/books/{book}', [AdminController::class, 'show_books'])->name('admin.books.show')->middleware("auth", "admin:admin");



// *** PROFILE ROUTES ***
Route::get('/profile', [ProfileController::class, "index"])->name("profile.index")->middleware("auth");

// profile.update_bio
Route::put('/profile/update_bio', [ProfileController::class, "update_bio"])->name("profile.update_bio")->middleware("auth");
// profile.update_image
Route::put('/profile/update_image', [ProfileController::class, "update_image"])->name("profile.update_image")->middleware("auth");


