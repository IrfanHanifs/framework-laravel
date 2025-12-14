<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TabunganController;
Route::get('/', function () {
    return redirect()->route('tabungan.index');
});

// Route resource untuk CRUD tabungan
// Ini akan membuat 7 route sekaligus:
// GET /tabungan -> index (daftar)
// GET /tabungan/create -> create (form tambah)
// POST /tabungan -> store (simpan data baru)
// GET /tabungan/{id} -> show (detail)
// GET /tabungan/{id}/edit -> edit (form edit)
// PUT/PATCH /tabungan/{id} -> update (update data)
// DELETE /tabungan/{id} -> destroy (hapus data)
Route::resource('tabungan', TabunganController::class);