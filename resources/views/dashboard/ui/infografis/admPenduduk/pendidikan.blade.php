@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<!-- Menampilkan Pesan Sukses -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Form untuk mengupdate data pendidikan -->
<form action="{{ url('/dashboard/ui/administrasi-penduduk/pendidikan') }}" method="POST">
    @csrf

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pendidikan as $item)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <div class="mb-3">
                        <label for="jumlah-{{ $item->id }}" class="form-label">Jumlah</label>
                        <input type="number" id="jumlah-{{ $item->id }}" name="jumlah[{{ $item->id }}]" class="form-control" value="{{ $item->jumlah }}" required>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>

@endsection
