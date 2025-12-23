@extends('layouts.master')
@section('MenuDokters', '')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Master Data Dokter</h5>
                <a href="{{ route('dokter.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Dokter
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Spesialisasi</th>
                            <th>No. SIP</th>
                            <th>No. Telp</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dokters as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->nip ?? '-' }}</td>
                            <td>{{ $dokter->jabatan ?? '-' }}</td>
                            <td>{{ $dokter->spesialisasi ?? '-' }}</td>
                            <td>{{ $dokter->no_sip ?? '-' }}</td>
                            <td>{{ $dokter->no_telp ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $dokter->status ? 'success' : 'secondary' }}">
                                    {{ $dokter->status_label }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('dokter.edit', $dokter->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('dokter.destroy', $dokter->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus data dokter ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data dokter</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
