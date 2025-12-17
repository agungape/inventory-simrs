@extends('layouts.master')
@section('MenuEmployees', '')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Karyawan</h5>

                        <!-- Tombol Tambah -->
                        <a href="{{ route('employees.create') }}" class="btn btn-sm btn-success mb-3">
                            <i class="bi bi-plus-circle"></i> Tambah Karyawan
                        </a>

                        <!-- Search Form -->
                        {{-- <div class="row mb-3">
                            <div class="col-md-6">
                                <form method="GET" action="{{ route('employees.index') }}" class="d-flex">
                                    <input type="text" name="search" class="form-control me-2"
                                        placeholder="Cari nama, NIK, atau NRP..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div> --}}

                        <!-- Tabel -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Departemen</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Bagian</th>
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col" width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employees as $employee)
                                        <tr>
                                            <td scope="row">{{ $employees->firstItem() + $loop->iteration - 1 }}</td>
                                            <td>{{ $employee->nrp }}</td>
                                            <td>{{ $employee->nama }}</td>
                                            <td>{{ $employee->nik }}</td>
                                            <td>{{ $employee->tanggal_lahir }}</td>
                                            <td>
                                                @if ($employee->jenis_kelamin == 'L')
                                                    Laki-laki
                                                @elseif($employee->jenis_kelamin == 'P')
                                                    Perempuan
                                                @else
                                                    {{ $employee->jenis_kelamin }}
                                                @endif
                                            </td>
                                            <td>{{ $employee->departement }}</td>
                                            <td>{{ $employee->jabatan }}</td>
                                            <td>{{ $employee->bagian }}</td>
                                            <td>{{ $employee->nama_perusahaan }}</td>
                                            <td>{{ $employee->no_hp }}</td>
                                            <td>
                                                <!-- Tombol Detail -->
                                                <a href="{{ route('employees.show', $employee->id) }}"
                                                    class="btn btn-sm btn-info" title="Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>

                                                <!-- Tombol Edit -->
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center text-muted">
                                                <i class="bi bi-exclamation-circle me-1"></i>
                                                Tidak ada data karyawan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-muted">
                                    Menampilkan {{ $employees->firstItem() }} - {{ $employees->lastItem() }}
                                    dari {{ $employees->total() }} karyawan
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    {{ $employees->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
