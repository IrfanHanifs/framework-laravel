@extends('layouts.app')

@section('title', 'Detail Tabungan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="fas fa-eye"></i> Detail Tabungan
                </h4>
            </div>
            <div class="card-body">
                <!-- Informasi Detail -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Nama Penabung:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $tabungan->nama_penabung }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Jumlah Tabungan:</strong>
                    </div>
                    <div class="col-md-8">
                        Rp {{ number_format($tabungan->jumlah, 0, ',', '.') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Tanggal:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $tabungan->tanggal ? $tabungan->tanggal->format('d/m/Y') : '-' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Keterangan:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $tabungan->keterangan ?? '-' }}
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('tabungan.edit', $tabungan->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('tabungan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Detail Tabungan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="fas fa-info-circle"></i> Detail Data Tabungan
                </h4>
            </div>
            <div class="card-body">
                <!-- Detail Informasi -->
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Penabung</th>
                        <td>{{ $tabungan->nama_penabung }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Tabungan</th>
                        <td>Rp {{ number_format($tabungan->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $tabungan->tanggal->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $tabungan->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $tabungan->created_at->format('d F Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diupdate</th>
                        <td>{{ $tabungan->updated_at->format('d F Y, H:i') }}</td>
                    </tr>
                </table>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tabungan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('tabungan.edit', $tabungan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tabungan.destroy', $tabungan->id) }}" 
                              method="POST" 
                              style="display: inline;"
                              id="delete-form-{{ $tabungan->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                    onclick="confirmDelete({{ $tabungan->id }})" 
                                    class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection