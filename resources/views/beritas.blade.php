@extends('layouts.frontend')

@section('main')
<section id="berita" class="berita">
    <h1 class="text-danger mt-4 fw-bold">Berita Desa</h1>
    <p class="fs-5">Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari
        Desa Karangpucung</p>

    <!-- Content -->

    @if ($posts->count())
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($posts as $post)
        <div class="col">
            <div class="card">
                <a href="/berita/{{ $post->slug }}">
                    <img src="{{ asset('storage/' . $post->img) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($post->context), 100) }}
                        </p>
                    </div>
                    <div class="d-flex">
                        <div class="p-2 w-100">
                            <div class="creator">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                {{ $post->user->name }}
                            </div>
                            <div class="views">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                                Dilihat {{ $post->views }} kali
                            </div>
                        </div>
                        <div class="p-2 flex-shrink-1 date rounded-start text-white fw-bold">
                            {{ $post->created_at->translatedFormat('d F Y') }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}

    @else
    <div class="d-flex justify-content-center">
        <div class="alert alert-secondary col-6 text-center" role="alert">
            Belum ada Berita terbaru!
        </div>
    </div>
    @endif
</section>
@endsection
