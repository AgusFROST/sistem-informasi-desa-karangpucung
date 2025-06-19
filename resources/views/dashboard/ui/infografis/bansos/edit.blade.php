@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-4">
        <form action="/dashboard/ui/bansos/{{ $bansos->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_bansos" class="form-label">Nama Bansos</label>
                <input type="text" class="form-control" name="nama_bansos" value="{{ $bansos->nama_bansos }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="{{ $bansos->jumlah }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
            </div>
</div>
@endsection
