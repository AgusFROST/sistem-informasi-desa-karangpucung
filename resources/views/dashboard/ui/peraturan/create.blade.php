@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori Peraturan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('/dashboard/ui/peraturan') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori Peraturan</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <a href="{{ url('/dashboard/ui/peraturan') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
