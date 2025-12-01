<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProductResource;
use App\Models\Product;

Route::get('products', function(Request $req){
    return \App\Models\Product::paginate($req->get('per_page',10));
});
Route::get('products/{product}', function(\App\Models\Product $product){ return $product; });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
