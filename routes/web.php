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
    $words = Word::all();
    return view('home', ['words' => $words]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Word related functions
Route::post('/create-word', [WordController::class, 'createWord']);


// Category related functions
Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ['categories' => $categories]);
});
Route::post('/create-category', [CategoryController::class, 'createCategory']);
