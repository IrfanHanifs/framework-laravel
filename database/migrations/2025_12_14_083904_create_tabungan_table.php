<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrations untuk membuat tabel
     */
    public function up(): void
    {
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id(); // Kolom ID primary key auto increment
            $table->string('nama_penabung'); // Nama orang yang menabung
            $table->decimal('jumlah', 15, 2); // Jumlah uang (max 15 digit, 2 desimal)
            $table->date('tanggal'); // Tanggal menabung
            $table->text('keterangan')->nullable(); // Catatan tambahan (boleh kosong)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Rollback migrations (hapus tabel)
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungans');
    }
};