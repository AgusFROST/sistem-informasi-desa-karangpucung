@extends('layouts.frontend')

@section('main')
<section id="potensi" class="potensi mt-5 mb-5">
    <h1 class="text-danger mt-4 fw-bold">Potensi Desa</h1>
    <p class="fs-5">Informasi tentang potensi dan kemajuan Desa di berbagai bidang seperti ekonomi, pariwisata,
        pertanian, industri kreatif, dan kelestarian lingkungan</p>

    <!-- Content -->

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($categories as $ctr)
        <div class="col">
            <div class="text-center">
                <a href="/potensi-desa?category={{ $ctr->slug }}" class="fw-bold text-dark">
                    <img src="{{ asset('storage/' . $ctr->img) }}" class="img-fluid rounded-pill mb-2"
                        alt="{{ $ctr->name }}">
                </a>
                <a href="/potensi-desa?category={{ $ctr->slug }}" class="fw-bold text-dark">
                    <h3>{{ $ctr->name }}</h3>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center">
        {{ $categories->links() }}
    </div>
</section>
@endsection