@extends('layouts.app')

@section('title', 'Edit Tabungan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">
                    <i class="fas fa-edit"></i> Edit Data Tabungan
                </h4>
            </div>
            <div class="card-body">
                <!-- Form Edit Data -->
                <form action="{{ route('tabungan.update', $tabungan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Input Nama Penabung -->
                    <div class="mb-3">
                        <label for="nama_penabung" class="form-label">
                            Nama Penabung <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('nama_penabung') is-invalid @enderror" 
                               id="nama_penabung" 
                               name="nama_penabung" 
                               value="{{ old('nama_penabung', $tabungan->nama_penabung) }}">
                        @error('nama_penabung')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Jumlah -->
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">
                            Jumlah Tabungan (Rp) <span class="text-danger">*</span>
                        </label>
                        <input type="number" 
                               class="form-control @error('jumlah') is-invalid @enderror" 
                               id="jumlah" 
                               name="jumlah" 
                               value="{{ old('jumlah', $tabungan->jumlah) }}"
                               step="0.01">
                        @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <input type="date" 
                               class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" 
                               name="tanggal" 
                               value="{{ old('tanggal', $tabungan->tanggal->format('Y-m-d')) }}">
                        @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">
                            Keterangan
                        </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" 
                                  name="keterangan" 
                                  rows="3">{{ old('keterangan', $tabungan->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit & Kembali -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tabungan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection