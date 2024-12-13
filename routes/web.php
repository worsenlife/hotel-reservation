<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;

Route::get('/')->name('welcome');

Route::get('/Reservasi', [ReservasiController::class, 'index'])->name('Reservasi.index');
Route::post('/Reservasi', [ReservasiController::class, 'store'])->name('Reservasi.store');
Route::get('/Reservasi/edit/{id}', [ReservasiController::class, 'edit'])->name('Reservasi.edit');
Route::post('/Reservasi/update/{id}', [ReservasiController::class, 'update'])->name('Reservasi.update');
Route::get('/Reservasi/delete/{id}', [ReservasiController::class, 'destroy'])->name('Reservasi.destroy');
Route::get('/Reservasi/cetak_pdf', [ReservasiController::class, 'cetakPdf'])->name('Reservasi.cetakPdf');