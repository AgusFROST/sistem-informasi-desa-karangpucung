@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ url('/dashboard/ui/administrasi-penduduk/umur') }}">
    @csrf

    <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
        @foreach($data as $row)
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Rentang Usia {{ $row->gender->jenis_kelamin }} : {{ $row->rentangUmur->usia }}</h5>
                    <input type="number" name="jumlah[{{ $row->id }}]" value="{{ $row->jumlah }}" class="form-control">
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary mb-4">Update</button>
</form>
@endsection
