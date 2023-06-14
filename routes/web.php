<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/create', function () {
    return view('create-surat');
})->middleware(['auth'])->name('create-surat');

Route::get('/', function () {
    return view('aparat');
})->middleware(['auth'])->name('list-cetak');

Route::get('cetak/{nik}', [PDFController::class, 'cetakSurat'])->middleware(['auth'])->name('cetak-surat');
Route::get('download/surat/{nik}', [PDFController::class, 'downloadSurat'])->middleware(['auth'])->name('download-surat');

Route::get('download/buku-register/{nik}', [PDFController::class, 'downloadBukuRegister'])->middleware(['auth'])->name('download-buku-register');

Route::get('/admin',[AdminController::class, 'index'])->middleware(['auth']);
Route::post('/admin',[AdminController::class, 'store'])->middleware(['auth']);
Route::get('/admin/register',[AdminController::class, 'showFormDaftar'])->middleware(['auth']);

require __DIR__.'/auth.php';
