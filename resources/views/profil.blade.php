@extends('layouts.frontend')

@section('main')
<section id="profil" class="profil">
    <div class="row">
        <div class="col-lg-6">
            <div class="text-center">
                <img src="{{ asset('storage/'. $icon->img) }}" width="35%">

                <h1 class="fw-bold">Desa Karangpucung</h1>
                <h6 class="fw-bold">
                    Kecamatan karangpucung, Kabupaten Cilacap, Provinsi Jawa Tengah
                </h6>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="visi text-center">
                <h2 class="fw-bold h1">VISI</h2>
                <div>{!! $visimisi->visi !!}</div>
            </div>
            <div class="misi">
                <h2 class="fw-bold h1 text-center mt-4">MISI</h2>
                <div>
                    {!! $visimisi->misi !!}
                </div>
            </div>
        </div>

    </div>

</section>

<section id="bagan" class="bagan mt-4">
    <h2 class="h1 text-danger fw-bold">Bagan Desa</h2>
    <p class="lead">Bagan Struktur Desa Karangpucung </p>

    {{-- <div class="pemdes mb-4">
        <h2 class="fw-bold">Struktur Organisasi Pemerintahan Desa</h2>
        @if($struktur && $struktur->pemdes)
        <img src="{{ asset('storage/' . $struktur->pemdes) }}" class="img-fluid rounded"
            alt="Struktur Organisasi Pemerintahan Desa">
        @else
        <p class="text-muted">Struktur Organisasi {{ $so->name }} belum tersedia.</p>
        @endif
    </div> --}}

    @foreach ($strukturOrganisasi as $so)
    <h2 class="fw-bold">Struktur Organisasi {{ $so->name }}</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
        @forelse ($so->organisasi as $org)
        <div class="col">
            <div class="card text-center" data-bs-toggle="tooltip" title="{{ $org->nama }} - {{ $org->jabatan }}">
                <img src="{{ asset('storage/'.$org->img) }}" class="card-img-top img-fluid"
                    onError="this.onerror=null;this.src='https://bk.unipasby.ac.id/morevej/2023/09/user-1.png';">

                <div class="card-body text-bg-danger">
                    <h5 class="card-title fw-bold">{{ $org->nama }}</h5>
                    <p class="card-text">{{ $org->jabatan }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Data belum tersedia.</p>
        @endforelse
    </div>
    @endforeach

    <script>
        // Pastikan bootstrap JS sudah dimuat
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    });
    </script>





</section>


<section id="sejarah" class="sejarah mt-4">
    <h2 class="h1 text-danger fw-bold">Sejarah Desa</h2>

    @forelse ($sejarahDesa as $sedes)
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">{{ $sedes->name }}</h4>
                    <a href="{{ asset('storage/'.$sedes->arsip) }}" class="link-dark" download>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-download text-primary" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path
                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                        </svg>
                        Unduh Berkas
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning" role="alert">
        Data belum tersedia.
    </div>
    @endforelse
</section>




<section id="petaLokasi" class="petaLokasi mt-4 mb-4">
    <h2 class="h1 text-danger fw-bold">Peta Lokasi Desa</h2>
    <p class="lead">Peta Lokasi Desa Karangpucung</p>

    <div class="row mt-4">
        <div class="col-lg-6 bg-white shadow">
            <div class="peta-info p-4">
                <h3 class="fw-bold">Desa karangpucung</h3>
                <div class="border-bottom border-3"></div>

                <div class="batas mt-3">
                    <h4 class="text-secondary">Batas Desa</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="fw-bold">Utara</h4>
                            <p class="lead">TAYEM</p>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold">Timur</h4>
                            <p class="lead">TAYEM TIMUR</p>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold">Selatan</h4>
                            <p class="lead">SINDANGBARANG</p>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold">Barat</h4>
                            <p class="lead">CIPOROS</p>
                        </div>

                    </div>
                </div>

                <div class="border-bottom border-3 mb-3"></div>
                <div class="row">
                    <div class="col">
                        <h4 class="text-secondary">Luas Desa</h4>
                    </div>
                    <div class="col">
                        <h4>xxxxxxxx</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 shadow">
            <div class="ratio ratio-16x9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.9778132392103!2d108.89984370209338!3d-7.413218866225174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e657e805ab3944f%3A0xc42d6a93a427717c!2sBalai%20Desa%20Karangpucung!5e0!3m2!1sid!2sid!4v1736462630954!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
