@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="col-6">
    <form action="{{ route('struktur.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('struktur.index') }}'">
            Kembali
        </button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
