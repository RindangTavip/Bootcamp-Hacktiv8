<?php

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

use App\Http\Controllers\IndexController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;

Route::redirect('/', '/posts');

Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::get('/index', [IndexController::class, 'index']);

Route::get('/input', [InputController::class, 'index']);

Route::get('/edit', [EditController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
