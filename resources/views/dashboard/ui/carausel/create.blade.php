@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/dashboard/ui/carausel" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="img" id="img" class="form-control" onchange="previewImage(event)">
                @error('img') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <img id="preview" src="#" alt="Preview Image" class="img-fluid d-none" style="max-width: 300px;">
            </div>

            <button type="button" class="btn btn-secondary"
                onclick="window.location.href='/dashboard/ui/carausel'">
                Kembali
            </button>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
