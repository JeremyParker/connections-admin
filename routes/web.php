<?php

use App\Models\{Category, Word};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, WordController, CategoryController};
use App\Http\Livewire\AddWordToCategory; // TODO: rename choose category for word
use App\Http\Controllers\CategoryWordController;
use App\Http\Livewire\Categories;

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

// Word related functions
Route::get('/words', [WordController::class, 'showWords'])->name('words.index');
Route::get('/word/{word}', [WordController::class, 'showEditWord'])->name('showEditWord');
Route::post('/words', [WordController::class, 'createWord'])->name('words.create');
Route::put('/word/{word}', [WordController::class, 'updateWord']);

// adding a word to a category
Route::get('/word/{word}/categories', AddWordToCategory::class)->name('showAddToCategory'); // TODO: rename choose category for word

Route::get('category_word/create', [CategoryWordController::class, 'showCreate'])->name('category_word.create');
Route::post('category_word', [CategoryWordController::class, 'store'])->name('category_word.store');

// Category related functions
Route::get('/categories', Categories::class)->name('categories.index');
Route::post('/categories', [CategoryController::class, 'createCategory'])->name('categories.create');

Route::get('/category/{category}', [CategoryController::class, 'showEditCategory'])->name('showEditCategory');
Route::put('/category/{category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
