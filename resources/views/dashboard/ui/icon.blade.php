@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="/dashboard/ui/icon" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="img" class="form-label">Upload Icon</label>
        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
            onchange="previewImage()">
        @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Preview Gambar -->
    <div class="mb-3">
        <label class="form-label">Preview:</label>
        <img id="img-preview" class="img-thumbnail" width="200" style="display: none;" alt="Image Preview">
    </div>

    <button type="submit" class="btn btn-primary">Update Icon</button>
</form>

@if ($icon && $icon->img)
<div class="mb-4">
    <h3 class="mt-4">Icon:</h3>
    <img src="{{ asset('storage/' . $icon->img) }}" alt="Current Icon" class="img-thumbnail" width="200">
</div>
@endif
@endsection

@section('script')
<script>
    function previewImage() {
        const fileInput = document.querySelector('#img');
        const imgPreview = document.querySelector('#img-preview');

        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.style.display = 'block'; // Tampilkan preview
                imgPreview.src = e.target.result; // Set gambar dari file input
            };

            reader.readAsDataURL(file);
        } else {
            imgPreview.style.display = 'none'; // Sembunyikan jika tidak ada file
        }
    }
</script>
@endsection