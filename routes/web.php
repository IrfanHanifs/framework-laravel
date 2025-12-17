<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;
Route::get('/', function () {
    return redirect()->route('tabungan.index');
});

// Route untuk CRUD tabungan
Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan.index');
Route::get('/tabungan/create', [TabunganController::class, 'create'])->name('tabungan.create');
Route::post('/tabungan', [TabunganController::class, 'store'])->name('tabungan.store');
Route::get('/tabungan/{tabungan}', [TabunganController::class, 'show'])->name('tabungan.show');
Route::get('/tabungan/{tabungan}/edit', [TabunganController::class, 'edit'])->name('tabungan.edit');
Route::put('/tabungan/{tabungan}', [TabunganController::class, 'update'])->name('tabungan.update');
Route::delete('/tabungan/{tabungan}', [TabunganController::class, 'destroy'])->name('tabungan.destroy');