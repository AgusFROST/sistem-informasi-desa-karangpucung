@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ url('/dashboard/ui/administrasi-penduduk/agama') }}" method="POST">
    @csrf
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($agamas as $agama)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $agama->name }}</h5>
                    <input type="hidden" name="agama[{{ $loop->index }}][id]" value="{{ $agama->id }}">
                    <input type="number" name="agama[{{ $loop->index }}][jumlah]" value="{{ $agama->jumlah }}" class="form-control">
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary mt-5 mb-5">Update</button>
</form>
@endsection
