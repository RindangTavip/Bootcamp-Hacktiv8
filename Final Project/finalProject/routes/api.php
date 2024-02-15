<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// konfigurasi URL untuk API
Route::get('order/getOrderId',[OrderController::class,'getOrderId'])->name('order.getOrderId');
Route::get('customer/getCustomerById',[CustomerController::class,'getCustomerById'])->name('customer.getCustomerById');
Route::get('category/getCategoryById',[CategoryController::class,'getCategoryById'])->name('category.getCategoryById');
Route::get('product/getProductById', [ProductController::class,'getProductById'])->name('product.getProductById');