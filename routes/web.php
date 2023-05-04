<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\Sessioncontroller;
use Illuminate\Support\Facades\Route;

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
    return view('layout.app');
})->name('welcome');

// Rutas de registro
Route::get('register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
Route::resource('concert', ConcertController::class);
Route::get('login', [Sessioncontroller::class, 'create'])->name('login.index');
Route::post('/login', [Sessioncontroller::class, 'store'])->name('login.index');
Route::get('/logout', [Sessioncontroller::class, 'destroy'])->name('login.destroy');
