@extends('layouts.app')

@section('title', 'Tambah Tabungan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-plus"></i> Tambah Data Tabungan
                </h4>
            </div>
            <div class="card-body">
                <!-- Informasi Total Tabungan -->
                <div class="alert alert-info mb-4">
                    <strong>Total Tabungan Saat Ini:</strong> 
                    Rp {{ number_format($totalTabungan, 0, ',', '.') }}
                </div>

                <!-- Form Tambah Tabungan -->
                <form action="{{ route('tabungan.store') }}" method="POST">
                    @csrf

                    <!-- Nama Penabung -->
                    <div class="mb-3">
                        <label for="nama_penabung" class="form-label">
                            <i class="fas fa-user"></i> Nama Penabung
                        </label>
                        <input type="text" 
                               class="form-control @error('nama_penabung') is-invalid @enderror" 
                               id="nama_penabung" 
                               name="nama_penabung" 
                               value="{{ old('nama_penabung') }}"
                               required>
                        @error('nama_penabung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah Tabungan -->
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">
                            <i class="fas fa-money-bill-wave"></i> Jumlah Tabungan
                        </label>
                        <input type="number" 
                               class="form-control @error('jumlah') is-invalid @enderror" 
                               id="jumlah" 
                               name="jumlah" 
                               value="{{ old('jumlah') }}"
                               step="0.01"
                               min="10000"
                               required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar"></i> Tanggal
                        </label>
                        <input type="date" 
                               class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" 
                               name="tanggal" 
                               value="{{ old('tanggal', date('Y-m-d')) }}"
                               required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">
                            <i class="fas fa-sticky-note"></i> Keterangan
                        </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" 
                                  name="keterangan" 
                                  rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('tabungan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection