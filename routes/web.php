<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, WordController, CategoryController};
use App\Http\Livewire\AddWordToCategory; // TODO: rename choose category for word
use App\Http\Livewire\ChooseWordForCategory;
use App\Http\Controllers\CategoryWordController;
use App\Http\Livewire\{Categories, Words};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', []);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Word related routes
Route::get('/words', Words::class)->name('words.index');
Route::post('/words', [WordController::class, 'createWord'])->name('words.create');
Route::get('/word/{word}', [WordController::class, 'showEditWord'])->name('word.edit');


// adding a word to a category
Route::get('/word/{word}/categories', AddWordToCategory::class)->name('showAddToCategory'); // TODO: rename choose category for word

// adding a category to a word
Route::get('/category/{category}/words', ChooseWordForCategory::class)->name('chooseWordForCategory');

Route::get('category{category}/word/{word}', [CategoryWordController::class, 'showEdit'])->name('category_word.edit');
Route::put('category/{category}/word/{word}', [CategoryWordController::class, 'update'])->name('category_word.update');

// CategoryWord related routes
Route::get('category_word/create', [CategoryWordController::class, 'showCreate'])->name('category_word.create');
Route::post('category_word', [CategoryWordController::class, 'store'])->name('category_word.store');

// Category related routes
Route::get('/categories', Categories::class)->name('categories.index');
Route::post('/categories', [CategoryController::class, 'createCategory'])->name('categories.create');
Route::get('/category/{category}', [CategoryController::class, 'showEditCategory'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
