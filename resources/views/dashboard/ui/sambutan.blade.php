@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('dashboard.ui.sambutan.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kepala Desa</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $sambutan->name ?? '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Isi Sambutan</label>

                <!-- Input tersembunyi untuk menyimpan data Trix -->
                <input id="body" type="hidden" name="body" value="{{ old('body', $sambutan->body ?? '') }}">

                <!-- Editor Trix -->
                <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>

                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Update Sambutan</button>
        </form>
    </div>
</div>
@endsection
