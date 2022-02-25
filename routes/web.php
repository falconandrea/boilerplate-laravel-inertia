<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'seo' => [
            'title' => 'Homepage',
            'description' => "This is the homepage"
        ]
    ]);
})->name('home');

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login.store')->middleware('guest');
Route::get('/register', [UserController::class, 'show_register'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->name('register.store')->middleware('guest');
Route::delete('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
