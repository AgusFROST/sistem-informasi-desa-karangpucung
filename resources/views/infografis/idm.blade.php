@extends('layouts.frontend')

@section('main')

@include('partials.frontend.menuInfografis')

<section id="idm" class="idm mt-5 mb-4">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="h1 text-danger fw-bold text-uppercase">IDM</h2>
            <p class="lead">
                Indeks Desa Membangun (IDM) merupakan indeks komposit yang dibentuk dari tiga indeks, yaitu Indeks Ketahanan Sosial, Indeks Ketahanan Ekonomi, dan Indeks Ketahanan Ekologi/Lingkungan.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-6 px-4 py-2">
                                <h5 class="fw-bold">SKOR IDM {{ $idm->tahun }}</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body text-end">
                                    <p class="fw-bold fs-1">{{ $idm->nilai }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-6 px-4 py-2">
                                <h5 class="fw-bold">STATUS IDM {{ $idm->tahun }}</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body text-end">
                                    <!-- Tampilkan status IDM dengan relasi -->
                                    <p class="fw-bold fs-1">{{ $idm->idmStatus->status }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
