<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    /**
     * Menampilkan halaman utama (daftar semua tabungan)
     */
    public function index()
    {
        // Ambil semua data tabungan, urutkan dari yang terbaru
        $tabungans = Tabungan::orderBy('tanggal', 'desc')->get();
        
        // Hitung total tabungan
        $totalTabungan = Tabungan::sum('jumlah');
        
        // Kirim data ke view
        return view('tabungan.index', compact('tabungans', 'totalTabungan'));
    }

    /**
     * Menampilkan form tambah data
     */
    public function create()
    {
        // Hitung total tabungan
        $totalTabungan = Tabungan::sum('jumlah');
        
        return view('tabungan.create', compact('totalTabungan'));
    }

    /**
     * Menyimpan data baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $validated = $request->validate([
            'nama_penabung' => 'required|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable'
        ], [
            'nama_penabung.required' => 'Nama penabung wajib diisi',
            'jumlah.required' => 'Jumlah tabungan wajib diisi',
            'jumlah.numeric' => 'Jumlah harus berupa angka',
            'tanggal.required' => 'Tanggal wajib diisi'
        ]);

        // Simpan data ke database
        Tabungan::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('tabungan.index')
            ->with('success', 'Data tabungan berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail satu data
     */
    public function show(Tabungan $tabungan)
    {
        return view('tabungan.show', compact('tabungan'));
    }

    /**
     * Menampilkan form edit data
     */
    public function edit(Tabungan $tabungan)
    {
        return view('tabungan.edit', compact('tabungan'));
    }

    /**
     * Update data di database
     */
    public function update(Request $request, Tabungan $tabungan)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_penabung' => 'required|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        // Update data
        $tabungan->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('tabungan.index')
            ->with('success', 'Data tabungan berhasil diupdate!');
    }

    /**
     * Hapus data dari database
     */
    public function destroy(Tabungan $tabungan)
    {
        // Hapus data
        $tabungan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('tabungan.index')
            ->with('success', 'Data tabungan berhasil dihapus!');
    }
}