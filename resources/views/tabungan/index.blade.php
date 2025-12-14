@extends('layouts.app')

@section('title', 'Data Tabungan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-list"></i> Daftar Tabungan
                </h4>
            </div>
            <div class="card-body">
                <!-- Pesan Sukses -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <!-- Tombol Tambah & Info Total -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('tabungan.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Tabungan
                    </a>
                    <div class="alert alert-info mb-0">
                        <strong>Total Tabungan:</strong> 
                        Rp {{ number_format($totalTabungan, 0, ',', '.') }}
                    </div>
                </div>

                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Nama Penabung</th>
                                <th width="15%">Jumlah</th>
                                <th width="15%">Tanggal</th>
                                <th width="25%">Keterangan</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tabungans as $index => $tabungan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tabungan->nama_penabung }}</td>
                                <td>Rp {{ number_format($tabungan->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $tabungan->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $tabungan->keterangan ?? '-' }}</td>
                                <td>
                                    <!-- Tombol Lihat Detail -->
                                    <a href="{{ route('tabungan.show', $tabungan->id) }}" 
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('tabungan.edit', $tabungan->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <!-- Form Hapus -->
                                    <form id="delete-form-{{ $tabungan->id }}" 
                                          action="{{ route('tabungan.destroy', $tabungan->id) }}" 
                                          method="POST" 
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                onclick="confirmDelete({{ $tabungan->id }})" 
                                                class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <em>Belum ada data tabungan</em>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection