<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\testController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('hello', [testController::class,'test']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::get('product/{product_id}/categories',[ProductController::class,'getProductCategories']);    // get the categories for product
Route::get('categories/{category_id}/product',[ProductController::class,'getCategoriesProduct']);  // get the product for categories
Route::apiResource('order',OrderController::class);
// Route::post('product/{product_id}',[OrderController::class,'addorder']);



Route::post('product/{id}',[CartController::class,'addtocart']);

// Cart && Cart items
Route::apiResource('cart',CartController::class);
Route::apiResource('cartitems',CartItemsController::class);

// order 
 