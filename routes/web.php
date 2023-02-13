<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::middleware(["auth"])->group(function (){
    Route::get('/dashboard',[PlatController::class, 'dashboard'])->name("dashboard");
    Route::get('/profil',[UserController::class, 'editProfil'])->name("profil.edit");
    Route::post('/profil/update',[UserController::class, 'updateProfil'])->name("profil.update");
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


Route::post("/user/auth",[UserController::class,'authenticate'])->name("user.authenticate");

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



// password reset

Route::get('/forgot-password', function () {
    return view('auth-forgot-password');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth-reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

