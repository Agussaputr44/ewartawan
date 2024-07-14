<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

$router->aliasMiddleware('role', CheckRole::class);

// landing
Route::get('/', function () {
    return view('landing');
});

Route::get('/auth/signin', [AuthController::class, 'getSignin'])->name('get-signin');
Route::get('/auth/signup', [AuthController::class, 'getSignup'])->name('get-signup');
Route::post('/auth/signin', [AuthController::class, 'postSignin'])->name('post-signin');
Route::post('/auth/signup', [AuthController::class, 'postSignup'])->name('post-signup');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// admin role
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'admin'])->name('admin');
});

Route::middleware(['role:wartawan'])->group(function () {
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
});
