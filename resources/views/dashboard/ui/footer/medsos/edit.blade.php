@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Media Sosial</h1>
</div>


<div class="row">
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('media-sosial.update', $mediaSosial->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="medsos_svg_id" class="form-label">Pilih SVG</label>
                <select name="medsos_svg_id" id="medsos_svg_id" class="form-control" required>
                    <option value="">Pilih SVG</option>
                    @foreach ($medsosSvgs as $svg)
                    <option value="{{ $svg->id }}" {{ $mediaSosial->medsos_svg_id == $svg->id ? 'selected' : '' }}>
                        {{ $svg->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $mediaSosial->url) }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('media-sosial.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
