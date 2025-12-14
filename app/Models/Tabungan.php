<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tabungans';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nama_penabung',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    // Casting tipe data
    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2'
    ];
}