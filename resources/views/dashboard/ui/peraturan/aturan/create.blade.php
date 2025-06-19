@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Aturan</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="{{ url('/dashboard/ui/peraturan/' . $category->slug) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Aturan</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Isi Aturan</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('/dashboard/ui/peraturan/' . $category->slug) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection