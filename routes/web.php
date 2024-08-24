<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RedakturController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomentarController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckRole;
use App\Models\Berita;
use Illuminate\Support\Facades\Route;

$router->aliasMiddleware('role', CheckRole::class);

Route::get('/', function () {
    $beritas = Berita::all();
    return view('landing', compact('beritas'));
})->name('landing');

Route::get('/auth/signin', [AuthController::class, 'getSignin'])->name('get-signin');
Route::get('/auth/signup', [AuthController::class, 'getSignup'])->name('get-signup');
Route::post('/auth/signin', [AuthController::class, 'postSignin'])->name('post-signin');
Route::post('/auth/signup', [AuthController::class, 'postSignup'])->name('post-signup');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// admin role
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'admin'])->name('admin');
});
Route::middleware(['role:user'])->group(function () {
    Route::get('/user/berita/{id}', [BeritaController::class, 'show'])->name('user.berita.id');
    Route::get('/feedback', [UserController::class, 'getFeedback'])->name('feedback');
    Route::get('/panduan', [UserController::class, 'getPanduan'])->name('panduan');
    Route::get('/media', [UserController::class, 'getDataMedia'])->name('media');
    Route::get('/hukum', [UserController::class, 'getHukum'])->name('hukum');
    Route::get('/pengumuman', [UserController::class, 'getPengumuman'])->name('pengumuman');
});

//wartawan role
Route::middleware(['role:wartawan'])->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::get('/wartawan/berita', [BeritaController::class, 'myBerita'])->name('wartawan.myberita');
    Route::get('/wartawan/kelola', [BeritaController::class, 'kelola'])->name('wartawan.kelola');
});

Route::middleware(['role:redaktur'])->group(function () {
    Route::get('/redaktur/berita', [RedakturController::class, 'kelola'])->name('redaktur.kelolaBerita');
    Route::get('/redaktur/komentar', [RedakturController::class, 'getKelolaKomentar'])->name('redaktur.kelolaKomentar');
    Route::put('/redaktur/komentar/update/{id}', [RedakturController::class, 'updateKomentarStatus'])->name('redaktur.komentar.edit');
    Route::delete('/redaktur/komentar/delete/{id}', [RedakturController::class, 'deleteKomentar'])->name('redaktur.komentar.delete');


    Route::resource('redaktur', RedakturController::class);
});


Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('admin');
    Route::get('/admin/kelola/komentar', [AdminController::class, 'getKelolaKomentar'])->name('kelola.komentar');
    Route::get('/admin/kelola/user', [AdminController::class, 'getKelolaUser'])->name('kelola.user');
    Route::get('/admin/kelola/berita', [AdminController::class, 'getKelolaBerita'])->name('kelola.berita');
    Route::delete('/admin/kelola/berita/{id}', [AdminController::class, 'deleteBerita'])->name('kelola.berita.delete');
    Route::delete('/admin/kelola/komentar/{id}', [AdminController::class, 'deleteKomentar'])->name('kelola.komentar.delete');
    Route::delete('/admin/kelola/user/{id}', [AdminController::class, 'deleteUser'])->name('kelola.user.delete');
    Route::post('/admin/kelola/user', [AdminController::class, 'adminCreateUser'])->name('kelola.user.store');
    Route::post('/admin/kelola/berita', [AdminController::class, 'adminCreateBerita'])->name('kelola.berita.store');
    Route::put('/admin/kelola/user/{id}/edit', [AdminController::class, 'adminEditUser'])->name('kelola.user.edit');
    Route::put('/admin/kelola/berita/{id}/edit', [AdminController::class, 'adminEditBerita'])->name('kelola.berita.edit');
    Route::put('/kelola/komentar/update/{id}', [AdminController::class, 'updateKomentarStatus'])->name('kelola.komentar.edit');

});


Route::apiResource('komentar', KomentarController::class);
