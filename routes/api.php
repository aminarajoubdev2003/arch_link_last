<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\DesignerController;
use App\Http\Controllers\Api\Order_customizeController;
use App\Http\Controllers\Api\Order_shopController;
use App\Http\Controllers\Api\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function (){
    Route::post('/register','register');
    Route::post('/login','login');
   Route::get('/logout','logout')->middleware('auth:sanctum');
   Route::post('/change/password','changePassword')->middleware('auth:sanctum');
   Route::post('/change/profile','changeProfile')->middleware('auth:sanctum');
   Route::post('/edit/area','edit_area')->middleware('auth:sanctum');
});

Route::controller(Order_customizeController::class)->group(function (){
    Route::post('/order/customize','store')->middleware('auth:sanctum');;
});

Route::controller(ReviewController::class)->group(function (){
   Route::post('/review/add','store')->middleware('auth:sanctum');
   Route::get('/review/all','index')->middleware('auth:sanctum');
});

Route::get('/cities',[CityController::class,'index']);

Route::get('/areas/{uuid}',[AreaController::class,'index']);

Route::get('/products',[ProductController::class,'index'])->middleware('auth:sanctum');
Route::get('/product/{uuid}',[ProductController::class,'show'])->middleware('auth:sanctum');
Route::get('/products/details',[ProductController::class,'all'])->middleware('auth:sanctum');
Route::get('/product/rates/{uuid}',[ProductController::class,'show_reviews'])->middleware('auth:sanctum');
Route::get('/products/most_buy',[ProductController::class,'most_buy'])->middleware('auth:sanctum');


Route::post('/choose',[Order_shopController::class,'store'])->middleware('auth:sanctum');
Route::post('/edit/{uuid}',[Order_shopController::class,'edit_amount'])->middleware('auth:sanctum');
Route::get('/shop',[Order_shopController::class,'shop'])->middleware('auth:sanctum');
Route::get('/card',[Order_shopController::class,'index'])->middleware('auth:sanctum');
Route::get('/destroy/{uuid}',[Order_shopController::class,'destroy'])->middleware('auth:sanctum');
Route::get('/all/shop/{uuid}',[Order_shopController::class,'all_shop'])->middleware('auth:sanctum');

Route::post('/add/blog',[BlogController::class,'store'])->middleware('auth:sanctum');
Route::get('/all/blog',[BlogController::class,'index'])->middleware('auth:sanctum');
Route::get('/least/blog',[BlogController::class,'least_three'])->middleware('auth:sanctum');
Route::get('/show/blog/{uuid}',[BlogController::class,'show'])->middleware('auth:sanctum');

Route::post('/add/comment',[CommentController::class,'store'])->middleware('auth:sanctum');
Route::get('/desiners',[DesignerController::class,'index'])->middleware('auth:sanctum');
Route::get('/desiner/{uuid}',[DesignerController::class,'show'])->middleware('auth:sanctum');
Route::get('/all/comments',[CommentController::class,'index'])->middleware('auth:sanctum');
