@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ url('/dashboard/ui/administrasi-penduduk/pekerjaan') }}" method="POST">
    @csrf

    <div class="row row-cols-2 row-cols-md-4 g-4">
        @foreach($pekerjaan as $index => $p)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <input type="hidden" name="pekerjaan[{{ $index }}][id]" value="{{ $p->id }}">
                    <input type="number" name="pekerjaan[{{ $index }}][jumlah]" value="{{ $p->jumlah }}" class="form-control" required>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary mt-4 mb-4">Update</button>
</form>
@endsection
