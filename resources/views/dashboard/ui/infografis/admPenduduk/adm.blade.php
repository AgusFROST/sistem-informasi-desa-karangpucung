@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('adm.penduduk.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <label for="penduduk" class="form-label">Penduduk</label>
            <input type="number" class="form-control" readonly
                value="{{ ($admPenduduk->laki_laki ?? 0) + ($admPenduduk->perempuan ?? 0) }}">
        </div>



        <div class="col">
            <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
            <input type="number" class="form-control @error('kepala_keluarga') is-invalid @enderror"
                id="kepala_keluarga" name="kepala_keluarga"
                value="{{ old('kepala_keluarga', $admPenduduk->kepala_keluarga ?? '') }}">
            @error('kepala_keluarga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="laki_laki" class="form-label">Laki-laki</label>
            <input type="number" class="form-control @error('laki_laki') is-invalid @enderror" id="laki_laki"
                name="laki_laki" value="{{ old('laki_laki', $admPenduduk->laki_laki ?? '') }}">
            @error('laki_laki')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="perempuan" class="form-label">Perempuan</label>
            <input type="number" class="form-control @error('perempuan') is-invalid @enderror" id="perempuan"
                name="perempuan" value="{{ old('perempuan', $admPenduduk->perempuan ?? '') }}">
            @error('perempuan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="penduduk_sementara" class="form-label">Penduduk Sementara</label>
            <input type="number" class="form-control @error('penduduk_sementara') is-invalid @enderror"
                id="penduduk_sementara" name="penduduk_sementara"
                value="{{ old('penduduk_sementara', $admPenduduk->penduduk_sementara ?? 0) }}">
            @error('penduduk_sementara')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="mutasi_penduduk" class="form-label">Mutasi Penduduk</label>
            <input type="number" class="form-control @error('mutasi_penduduk') is-invalid @enderror"
                id="mutasi_penduduk" name="mutasi_penduduk"
                value="{{ old('mutasi_penduduk', $admPenduduk->mutasi_penduduk ?? 0) }}">
            @error('mutasi_penduduk')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <h2 class="mt-5">Perkawinan</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <label for="belum_menikah" class="form-label">Belum Menikah</label>
            <input type="number" class="form-control @error('belum_menikah') is-invalid @enderror" id="belum_menikah"
                name="belum_menikah" value="{{ old('belum_menikah', $admPenduduk->belum_menikah ?? 0) }}">
            @error('belum_menikah')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="menikah" class="form-label">Menikah</label>
            <input type="number" class="form-control @error('menikah') is-invalid @enderror" id="menikah" name="menikah"
                value="{{ old('menikah', $admPenduduk->menikah ?? 0) }}">
            @error('menikah')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="cerai_hidup" class="form-label">Cerai Hidup</label>
            <input type="number" class="form-control @error('cerai_hidup') is-invalid @enderror" id="cerai_hidup"
                name="cerai_hidup" value="{{ old('cerai_hidup', $admPenduduk->cerai_hidup ?? 0) }}">
            @error('cerai_hidup')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col">
            <label for="cerai_mati" class="form-label">Cerai Mati</label>
            <input type="number" class="form-control @error('cerai_mati') is-invalid @enderror" id="cerai_mati"
                name="cerai_mati" value="{{ old('cerai_mati', $admPenduduk->cerai_mati ?? 0) }}">
            @error('cerai_mati')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update Data</button>
</form>
@endsection