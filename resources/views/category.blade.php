@extends('layouts.frontend')

@section('main')
<section id="potensi" class="potensi-desa mt-5 mb-5">
    <h1 class="text-danger mt-4 fw-bold">{{ $category->name }}</h1>
    <p class="fs-5">Menampilkan semua potensi untuk kategori {{ $category->name }}</p>

    <!-- Content -->
    @if ($potensis->count())
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($potensis as $post)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $post->img) }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                    <a href="/potensi-desa/{{ $post->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $potensis->links() }}
    <!-- Pagination -->
    @else
    <p class="text-center">Belum ada potensi untuk kategori ini.</p>
    @endif
</section>
@endsection