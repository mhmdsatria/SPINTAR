<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/admin/super-admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'superAdmin']);
    Route::get('/admin/super-admin',[AdminController::class,'superAdmin']);
    Route::get('/admin/admin',[AdminController::class,'admin']);
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/admin/super-admin/add-user', [AdminController::class, 'addUserForm']);
    Route::post('/admin/super-admin/add-user', [AdminController::class, 'addUser']);
});

Route::get('/register', [SesiController::class, 'registerForm']);
Route::post('/register', [SesiController::class, 'register']);

Route::get('/konsultasi', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
Route::post('/konsultasi/verifikasi/{id}', [AdminController::class, 'verifikasiKonsultasi'])
    ->name('konsultasi.verifikasi');

