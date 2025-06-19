@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form action="{{ route('categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Hidden slug field -->
            <input
                type="hidden"
                id="slug"
                name="slug"
                value="{{ old('slug', $category->slug) }}">

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input
                    class="form-control @error('img') is-invalid @enderror"
                    type="file"
                    id="img"
                    name="img"
                    onchange="previewImage()">
                @error('img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <!-- Image preview -->
                <div id="imgPreview" class="mt-2">
                    @if($category->img)
                    <img src="{{ asset('storage/' . $category->img) }}" alt="Current Image" class="img-fluid">
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script>
    // Autogenerate slug from name
    document.getElementById('name').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });

    // Image preview function
    function previewImage() {
        const file = document.getElementById('img').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imgPreview');
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-fluid">`;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
