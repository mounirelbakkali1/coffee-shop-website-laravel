<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;




Route::middleware(["auth"])->group(function (){
    Route::get('/dashboard',[PlatController::class, 'dashboard'])->name("dashboard");
    // crud plat
    Route::get('/plats/create', [PlatController::class, 'create'])->name('plats.create');
    Route::post('/plats/store', [PlatController::class, 'store'])->name('plats.store');
    Route::get('plats/{plat}/edit', [PlatController::class, 'edit'])->name('plats.edit');
    Route::put('plats/{plat}', [PlatController::class, 'update'])->name('plats.update');
    Route::delete('plats/{plat}', [PlatController::class, 'destroy'])->name('plats.destroy');

    // crud category
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


Route::post("/user/auth",[\App\Http\Controllers\UserController::class,'authenticate'])->name("user.authenticate");

Route::get("/user/register",[\App\Http\Controllers\UserController::class,'register'])->name("user.signup");
Route::post("/user/register/create",[\App\Http\Controllers\UserController::class,'createAccount'])->name("user.create_account");

Route::get('/',[PlatController::class, 'index'])->name("home");

Route::get('/login',function(){
  return view("login");
})->name("login");
Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get("/logout",[\App\Http\Controllers\UserController::class,"logout"])->name("logout");









//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

