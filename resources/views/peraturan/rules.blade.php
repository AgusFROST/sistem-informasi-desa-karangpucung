@extends('layouts.frontend')

@section('main')
<section id="peraturan" class="peraturan mb-5">
    <h1 class="text-danger mt-4 fw-bold">Peraturan Desa</h1>
    <p class="fs-5">Informasi mengenai berbagai peraturan yang berlaku di Desa Karangpucung.</p>

    @foreach($categories as $category)
    <div class="mb-4">
        <h3 class="fw-bold">{{ $category->name }}</h3>

        @if ($category->rules->count() > 0)
        <div class="row">
            @foreach($category->rules as $rule)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rule->name }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($rule->body), 50) }}</p>
                        <a href="{{ url('/peraturan/' . $rule->slug) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted">Belum ada aturan dalam kategori ini.</p>
        @endif
    </div>
    @endforeach
</section>
@endsection
