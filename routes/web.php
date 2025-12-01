<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InventoryController;

Route::get('/', function(){ return redirect()->route('dashboard'); });

Route::get('/dashboard', function(){
    $businessCount = \App\Models\Business::count();
    $productCount = \App\Models\Product::count();
    $clientCount = \App\Models\Client::count();
    $saleCount = \App\Models\Sale::count();
    return view('dashboard', compact('businessCount','productCount','clientCount','saleCount'));
})->name('dashboard');

Route::resource('businesses', BusinessController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('sales', SaleController::class);
Route::resource('invoices', InvoiceController::class)->only(['index','show']);
Route::resource('inventory', InventoryController::class)->only(['index','create','store']);

