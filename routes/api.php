<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(App\Http\Controllers\ProductController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('get-product', 'getProduct')->name('getProduct');
    Route::get('edit-product', 'editProduct')->name('editProduct');
    Route::get('trending-products', 'trendingProducts');
    Route::post('create-product', 'createProduct')->name('createProduct');
    Route::post('update-product', 'updateProduct')->name('updateProduct');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::controller(App\Http\Controllers\CategoryController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('get-category', 'getCategory')->name('getCategory');
    Route::get('edit-category', 'editCategory')->name('editCategory');
    Route::post('create-category', 'createCategory')->name('createCategory');
    Route::post('update-category', 'updateCategory')->name('updateCategory');
});

Route::controller(App\Http\Controllers\ReviewController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('get-review', 'getReview')->name('getReview');
    Route::view('add-review', 'addReview')->name('addReview');
    Route::get('edit-review', 'editReview')->name('editReview');
    Route::post('create-review', 'createReview')->name('createReview');
    Route::post('update-review', 'updateReview')->name('updateReview');
});
