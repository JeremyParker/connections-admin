<?php

use App\Models\{Category, Word};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, WordController, CategoryController};

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
Route::get('/word/{word}', [WordController::class, 'showEditWord']);

Route::post('/words', [WordController::class, 'createWord']);
Route::put('/word/{word}', [WordController::class, 'updateWord']);

// Category related functions
Route::get('/categories', [CategoryController::class, 'showCategories']);
Route::post('/categories', [CategoryController::class, 'createCategory'])->name('categories.create');

Route::get('/category/{category}', [CategoryController::class, 'showEditCategory']);
Route::put('/category/{category}', [CategoryController::class, 'updateCategory']);
