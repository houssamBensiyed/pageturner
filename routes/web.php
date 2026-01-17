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
Route::get('/category/{category}/{page?}', function (string $category, ?int $page = 1) {
    return "Displaying {$category} books - Page: {$page}";
})->name('books.category');

/*
|--------------------------------------------------------------------------
| Part 3: Admin Panel Routes (Route Group)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->name('dashboard');

    // Create book form (GET)
    Route::get('/books/create', function () {
        return 'Form to create a new book';
    })->name('books.create');

    // Store new book (POST)
    Route::post('/books', function () {
        return 'Storing new book...';
    })->name('books.store');

    // Edit book form (GET with parameter)
    Route::get('/books/{id}/edit', function ($id) {
        return "Form to edit book with ID: {$id}";
    })->name('books.edit');

    // Update book (PUT/PATCH with parameter)
    Route::match(['put', 'patch'], '/books/{id}', function ($id) {
        return "Updating book with ID: {$id}";
    })->name('books.update');

    // Delete book (DELETE with paramater)
    Route::delete('/books/{id}', function ($id) {
        return "Deleting book with ID: {$id}";
    })->name('books.destroy');
});


/*
|--------------------------------------------------------------------------
| Part 4: Fallback Route
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return redirect('/');
});