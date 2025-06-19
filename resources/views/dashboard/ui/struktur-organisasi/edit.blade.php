@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('struktur.update', $struktur->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Organisasi / Lembaga</label>
                <input type="text" name="name" class="form-control" value="{{ $struktur->name }}" required>
            </div>
            <button type="button" class="btn btn-secondary"
                onclick="window.location.href='{{ route('struktur.index') }}'">
                Kembali
            </button>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
