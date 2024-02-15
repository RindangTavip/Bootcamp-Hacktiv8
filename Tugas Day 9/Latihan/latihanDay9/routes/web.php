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

use App\Http\Controllers\BiodataController;

Route::redirect('/', '/biodata');

Route::resource ('biodata', BiodataController::class);

// Route::get("/biodata", [BiodataController::class, 'index'])->name('biodata.index');
// Route::get("/biodata/{id}", [BiodataController::class, 'show'])->name('biodata.show');
// Route::delete("/biodata/{id}", [BiodataController::class, 'destroy'])->name('biodata.destroy');
