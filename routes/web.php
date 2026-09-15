<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\FileTestController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WhatsappWebhookController;

Route::post('/webhook/whatsapp', [WhatsappWebhookController::class, 'handle']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/konsultasi', [PublicController::class, 'showForm'])->name('konsultasi.show');
Route::post('/konsultasi', [PublicController::class, 'submitForm'])->name('konsultasi.submit');


Route::get('/file-test', function () {
    return '
        <form action="/file-test" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit">Unggah File</button>
        </form>
    ';
});

// Rute untuk memproses unggahan file
Route::post('/file-test', [FileTestController::class, 'uploadTest']);