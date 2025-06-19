@extends('layouts.frontend')

@section('main')

@include('partials.frontend.menuInfografis')

<section id="apbdes" class="apbdes mt-5 mb-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="h3 text-danger fw-bold text-uppercase">
                APB Desa Karangpucung Tahun {{ date('Y') }}
            </h2>
            <p class="lead">
                Desa Karangpucung, Kecamatan Karangpucung, Kabupaten Cilacap, Provinsi Jawa Tengah
            </p>
        </div>
        <div class="col-lg-6">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-caret-up-fill text-success" viewBox="0 0 16 16">
                                    <path
                                        d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                                </svg>
                                Pendapatan
                            </h3>
                            <p class="card-text fs-4 fw-bold text-success">
                                Rp. {{ number_format($apbdes->pendapatan ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if ($apbdes->belanja > $apbdes->pendapatan)
                            <h3 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-caret-down-fill text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                                Belanja
                            </h3>
                            <p class="card-text fs-4 fw-bold text-danger">
                                Rp. {{ number_format($apbdes->belanja ?? 0, 0, ',', '.') }}
                            </p>
                            @else
                            <h3 class="card-title">

                                Belanja
                            </h3>
                            <p class="card-text fs-4 fw-bold text-secondary">
                                Rp. {{ number_format($apbdes->belanja ?? 0, 0, ',', '.') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</section>

@endsection
