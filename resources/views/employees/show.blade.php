@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Karyawan</h5>

                        <div class="mb-3">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-sm">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </div>

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">NRP</th>
                                        <td>{{ $employee->nrp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $employee->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $employee->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d/m/Y') }} /
                                            {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->age }} tahun</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>
                                            @if ($employee->jenis_kelamin == 'L')
                                                Laki-laki
                                            @elseif($employee->jenis_kelamin == 'P')
                                                Perempuan
                                            @else
                                                {{ $employee->jenis_kelamin }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No. HP</th>
                                        <td>{{ $employee->no_hp }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">Departemen</th>
                                        <td>{{ $employee->departement }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>{{ $employee->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bagian</th>
                                        <td>{{ $employee->bagian ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td>{{ $employee->nama_perusahaan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diupdate</th>
                                        <td>{{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="mt-3">
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus Karyawan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
