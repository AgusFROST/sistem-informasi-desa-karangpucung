@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form action="{{ route('potensi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                    name="category_id" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Upload Image</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    onchange="previewImage()">
                @error('img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <!-- Tempat untuk preview gambar -->
                <img id="imgPreview" class="img-fluid mt-3" style="max-height: 300px; display: none;">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Content</label>

                <!-- Input hidden untuk menyimpan data dari Trix Editor -->
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">

                <!-- Trix Editor -->
                <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>

                <!-- Pesan error -->
                @error('body')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="button" class="btn btn-secondary" onclick="window.location.href='/dashboard/potensi/'">
                Kembali
            </button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<!-- Script untuk preview gambar -->
<script>
    function previewImage() {
        const image = document.querySelector('#img');
        const imgPreview = document.querySelector('#imgPreview');

        imgPreview.style.display = 'block';

        const fileReader = new FileReader();
        fileReader.readAsDataURL(image.files[0]);

        fileReader.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
@endsection
