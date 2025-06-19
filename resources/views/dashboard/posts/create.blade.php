@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Post</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="POST" action="{{ url('/dashboard/posts') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">


            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    onchange="previewImage()">
                <img id="image-preview" src="#" alt="Image Preview" class="mt-2"
                    style="display:none; max-height: 200px;">
                @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="context" class="form-label">Context</label>
                <!-- Textarea untuk Trix editor -->
                <input id="context" type="hidden" name="context" value="{{ old('context') }}" required>
                <!-- Trix Editor -->
                <trix-editor input="context" class="@error('context') is-invalid @enderror"></trix-editor>
                <!-- Error Feedback -->
                @error('context')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="button" class="btn btn-secondary" onclick="window.location.href='/dashboard/posts'">
                Kembali
            </button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('slug')
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
@section('previewImg')
<script>
    function previewImage() {
        const imgInput = document.querySelector('#img');
        const imgPreview = document.querySelector('#image-preview');

        const file = imgInput.files[0];
        if (file) {
            imgPreview.style.display = 'block';
            imgPreview.src = URL.createObjectURL(file);
        } else {
            imgPreview.style.display = 'none';
        }
    }
</script>
@endsection