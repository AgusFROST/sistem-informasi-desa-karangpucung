@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Sejarah Desa</h1>
</div>
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('sejarah-desa.update', $sejarahDesa->slug) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Arsip Desa</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $sejarahDesa->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="arsip" class="form-label">Arsip (PDF, JPG, PNG)</label>
                @if ($sejarahDesa->arsip)
                <p>Arsip Saat Ini:
                    <a href="{{ Storage::url($sejarahDesa->arsip) }}" target="_blank" class="btn btn-sm btn-info">Lihat
                        Arsip</a>
                </p>
                @endif
                <input type="file" class="form-control @error('arsip') is-invalid @enderror" id="arsip" name="arsip"
                    accept=".pdf,.jpg,.png">
                <small class="text-muted">Format yang didukung: PDF, JPG, PNG.</small>
                @error('arsip')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('sejarah-desa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
