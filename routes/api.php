<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CustomerApiController;

Route::get('customers', [CustomerApiController::class, 'index']);
Route::post('customers', [CustomerApiController::class, 'store']);
Route::get('customers/{id}', [CustomerApiController::class, 'show']);
Route::put('customers/{id}', [CustomerApiController::class, 'update']);
Route::delete('customers/{id}', [CustomerApiController::class, 'destroy']);

use App\Http\Controllers\Api\CategoryApiController;

Route::get('categories', [CategoryApiController::class, 'index']);
Route::post('categories', [CategoryApiController::class, 'store']);
Route::get('categories/{id}', [CategoryApiController::class, 'show']);
Route::put('categories/{id}', [CategoryApiController::class, 'update']);
Route::delete('categories/{id}', [CategoryApiController::class, 'destroy']);

use App\Http\Controllers\Api\ProductApiController;

Route::get('products', [ProductApiController::class, 'index']);
Route::post('products', [ProductApiController::class, 'store']);
Route::get('products/{id}', [ProductApiController::class, 'show']);
Route::put('products/{id}', [ProductApiController::class, 'update']);
Route::delete('products/{id}', [ProductApiController::class, 'destroy']);

use App\Http\Controllers\Api\EmployeeApiController;

Route::get('employees', [EmployeeApiController::class, 'index']);
Route::post('employees', [EmployeeApiController::class, 'store']);
Route::get('employees/{id}', [EmployeeApiController::class, 'show']);
Route::put('employees/{id}', [EmployeeApiController::class, 'update']);
Route::delete('employees/{id}', [EmployeeApiController::class, 'destroy']);

use App\Http\Controllers\Api\OrderApiController;

Route::get('orders', [OrderApiController::class, 'index']);
Route::post('orders', [OrderApiController::class, 'store']);
Route::get('orders/{id}', [OrderApiController::class, 'show']);
Route::put('orders/{id}', [OrderApiController::class, 'update']);
Route::delete('orders/{id}', [OrderApiController::class, 'destroy']);

use App\Http\Controllers\Api\SupplierApiController;

Route::get('suppliers', [SupplierApiController::class, 'index']);
Route::post('suppliers', [SupplierApiController::class, 'store']);
Route::get('suppliers/{id}', [SupplierApiController::class, 'show']);
Route::put('suppliers/{id}', [SupplierApiController::class, 'update']);
Route::delete('suppliers/{id}', [SupplierApiController::class, 'destroy']);

use App\Http\Controllers\Api\StockApiController;

Route::get('stocks', [StockApiController::class, 'index']);
Route::post('stocks', [StockApiController::class, 'store']);
Route::get('stocks/{id}', [StockApiController::class, 'show']);
Route::put('stocks/{id}', [StockApiController::class, 'update']);
Route::delete('stocks/{id}', [StockApiController::class, 'destroy']);

use App\Http\Controllers\Api\ShippingApiController;

Route::get('shippings', [ShippingApiController::class, 'index']);
Route::post('shippings', [ShippingApiController::class, 'store']);
Route::get('shippings/{id}', [ShippingApiController::class, 'show']);
Route::put('shippings/{id}', [ShippingApiController::class, 'update']);
Route::delete('shippings/{id}', [ShippingApiController::class, 'destroy']);
