@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-8">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ url('/dashboard/ui/visi-misi') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="visi">Visi</label>
                <input id="visi" type="hidden" name="visi" value="{{ old('visi', $visiMisi ? $visiMisi->visi : '') }}"
                    required>
                <!-- Trix Editor -->
                <trix-editor input="visi" class="@error('visi') is-invalid @enderror"></trix-editor>
            </div>

            <div class="form-group mb-3">
                <label for="misi">Misi</label>
                <input id="misi" type="hidden" name="misi" value="{{ old('misi', $visiMisi ? $visiMisi->misi : '') }}"
                    required>
                <!-- Trix Editor -->
                <trix-editor input="misi" class="@error('misi') is-invalid @enderror"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary mb-4">Update</button>
        </form>
    </div>
</div>

@endsection
