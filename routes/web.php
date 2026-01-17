<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Part 1: Basic Public Routes
|--------------------------------------------------------------------------
*/

// View route for homepage
Route::view('/', 'welcome')->name('home');

// View route for about page
Route::view('/about', 'about')->name('about');

// Redirect route (old URL to new URL)
Route::redirect('/books-catalog', '/books', 301);

/*
|--------------------------------------------------------------------------
| Part 2: Book Routes with Parameters
|--------------------------------------------------------------------------
*/

// List all books
Route::get('/books', function () {
    return 'Displaying all books';
})->name('books.index');

// Show a single book (required parameter)
Route::get('/books/{id}', function (string $id) {
    return "Displaying book with ID: {$id}";
})->name('books.show');

// Show books by category with optional page parameter
Route::get('/category/{category}/{page?}', function (string $category, ?string $page = 1) {
    return "Displaying {$category} books - Page: {$page}";
})->name('books.category');
