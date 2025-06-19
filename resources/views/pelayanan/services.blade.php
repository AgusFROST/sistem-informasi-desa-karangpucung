@extends('layouts.frontend')

@section('main')
<section id="pelayanan" class="pelayanan">
    <h1 class="text-danger mt-4 fw-bold">Pelayanan Desa</h1>
    <p class="fs-5">Informasi mengenai berbagai layanan yang tersedia di Desa Karangpucung.</p>

    <div class="row">
        @foreach($pelayanans as $pelayanan)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pelayanan->name }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($pelayanan->body), 100) }}</p>
                    <a href="/pelayanan-desa/{{ $pelayanan->slug }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection