@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<form action="/dashboard/ui/carausel/{{ $carausel->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <br>
                <img id="imgPreview" src="{{ asset('storage/'.$carausel->img) }}" alt="Carausel" class="mb-2 img-fluid"
                    width="500">
                @error('img') <small class="text-danger">{{ $message }}</small> @enderror
                <input type="file" name="img" id="img" class="form-control" onchange="previewImage()">
            </div>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/dashboard/ui/carausel'">
                Kembali
            </button>
            <button class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

<script>
    function previewImage() {
        const img = document.querySelector("#img");
        const imgPreview = document.querySelector("#imgPreview");

        if (img.files && img.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };
            reader.readAsDataURL(img.files[0]);
        }
    }
</script>
@endsection
