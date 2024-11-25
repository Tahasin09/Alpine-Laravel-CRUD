<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/alpine','alpine.demo',['title'=>'alpine Project']);
Route::view('/alpine2','alpine.demo2',['title'=>'alpine Project']);
Route::get('/',[ProductController::class, 'form']);
Route::get('/products',[ProductController::class, 'index']);
Route::post('/products',[ProductController::class, 'store']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);
Route::put('/products/{id}',[ProductController::class, 'update']);
