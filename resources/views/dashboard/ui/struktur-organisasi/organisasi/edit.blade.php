@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Anggota {{ $struktur->name }}</h1>
</div>

<div class="row">
    <div class="col-8">
        <form action="{{ route('organisasi.update', [$struktur->slug, $organisasi->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $organisasi->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $organisasi->jabatan }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Foto</label>
                <input type="file" class="form-control" id="img" name="img" accept="image/*"
                    onchange="previewImage(event)">

                @if ($organisasi->img)
                <p class="mt-2">Foto saat ini:</p>
                <img src="{{ asset('storage/'.$organisasi->img) }}" width="100" id="currentImage">
                @endif
            </div>

            <div class="mb-3">
                <img id="imagePreview" src="#" class="img-thumbnail d-none" style="max-width: 200px;">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('organisasi.index', $struktur->slug) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const currentImage = document.getElementById('currentImage');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');

            if (currentImage) {
                currentImage.style.display = 'none'; // Sembunyikan foto lama
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
