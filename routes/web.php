<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

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

Route::get('/', [imageController::class, 'index']);


Route::get('/add', [imageController::class, 'create']);



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('image/create', [imageController::class, 'create']);


Route::POST('image/store', [imageController::class, 'store']);

Route::get('image/{id}/edit',[imageController::class, 'edit']);

Route::put('image/{id}/update',[imageController::class, 'update']);


Route::get('images/search', [imageController::class, 'search']);




