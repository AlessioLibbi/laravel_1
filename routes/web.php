<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
     Route::get('/events/form', [EventController::class, 'show']);
     Route::get('/events/edit/{id}',[EventController::class, 'updateView']);
     Route::post('/events/edit/{id}', [EventController::class, 'update']);
     Route::post('/events/new', [EventController::class, 'store']);
     Route::get('/events/products/{id}/edit', [ProductController::class,'updateView']);
     Route::post('/events/products/{id}/edit', [ProductController::class,'update']);
     Route::post('/events/{id}/products', [ProductController::class,'store'])->name('products.add');
     Route::get('/events/{id}/products', [ProductController::class,'index']);
});


Route::get('/', [EventController::class, 'index']);
Route::get('/events', [EventController::class, 'index']);

Route::get('/events/show/{id}', [EventController::class, 'details']);
Route::get('/events/{id}/subscriber/{userId}', [EventController::class, 'subscriberSignup']);
Route::get('/events/{id}/desubscribe/{userId}', [EventController::class, 'desubscribeSignup']);
//EDIT

//EDIT




Route::get('/events/delete/{id}', [EventController::class, 'delete'])
     ->name('events.delete');
// Route::get('/', [ProductController::class, 'index']);
//     Route::get('/product', [ProductController::class, 'index']);
//     Route::post('/product/calc', [ProductController::class, 'store']);
//     //POST





Route::get('/product/delete/{id}', [ProductController::class, 'delete'])
     ->name('product.delete');
    


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
