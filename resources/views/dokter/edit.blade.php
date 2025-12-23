@extends('layouts.master')
@section('MenuDokters', '')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                {{ isset($dokter) ? 'Edit' : 'Tambah' }} Data Dokter
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ isset($dokter) ? route('dokter.update', $dokter->id) : route('dokter.store') }}"
                  method="POST">
                @csrf
                @if(isset($dokter))
                    @method('PUT')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control"
                               value="{{ old('nama', $dokter->nama ?? '') }}" required>
                        @error('nama')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control"
                               value="{{ old('nip', $dokter->nip ?? '') }}">
                        @error('nip')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control"
                               value="{{ old('jabatan', $dokter->jabatan ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Spesialisasi</label>
                        <input type="text" name="spesialisasi" class="form-control"
                               value="{{ old('spesialisasi', $dokter->spesialisasi ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. SIP</label>
                        <input type="text" name="no_sip" class="form-control"
                               value="{{ old('no_sip', $dokter->no_sip ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control"
                               value="{{ old('no_telp', $dokter->no_telp ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $dokter->email ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ (old('status', $dokter->status ?? true) == true) ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="0" {{ (old('status', $dokter->status ?? true) == false) ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $dokter->alamat ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
