@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/ui/pelayanan/{{ $pelayanan->slug }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $pelayanan->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input id="body" type="hidden" name="body" value="{{ $pelayanan->body }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <a href="/dashboard/ui/pelayanan" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection