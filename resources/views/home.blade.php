@extends('layouts.frontend')

@section('main')
<section id="jelajahDesa" class="jelajahDesa mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="h1 text-danger fw-bold">JELAJAHI DESA </h2>
            <p class="lead">Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa. Aspek
                pemerintahan, penduduk, demografi, potensi Desa, dan juga berita tentang Desa. </p>
        </div>
        <div class="col-lg-6">
            <div class="row row-cols-2 row-cols-md-2 g-4 text-center">
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <a href="https://cekdptonline.kpu.go.id/">
                                <h5 class="card-title">
                                    <img src="/assets/img/jelajah/cek-dpt.png" class="img-fluid" width="35%">
                                </h5>
                            </a>
                            <a href="https://cekdptonline.kpu.go.id/">
                                <p class="card-text">
                                    Cek DPT Online
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <a href="/berita">
                                <h5 class="card-title">
                                    <img src="/assets/img/jelajah/blog.png" class="img-fluid" width="35%">
                                </h5>
                            </a>
                            <a href="/berita">
                                <p class="card-text">
                                    Berita Desa
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <a href="/infografis/penduduk">
                                <h5 class="card-title">
                                    <img src="/assets/img/jelajah/inf-pub.png" class="img-fluid" width="35%">
                                </h5>
                            </a>
                            <a href="/ppid">
                                <p class="card-text">
                                    Informasi Publik
                                </p>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>

<section id="sambutan" class="sambutan my-4 px-4 mt-5">
    <div class="row">
        <div class="col-lg-4 text-center">
            <?php $icon = App\Models\Icon::first(); ?>
            <img src="{{ asset('storage/'. $icon->img) }}" class="logo-sambutan img-fluid">
        </div>
        <div class="col-lg-8">
            <h2 class="h1 text-danger fw-bold">Sambutan Kepala Desa</h2>
            <h3>{{ $sambutan->name }}</h3>
            <h5>Kepala Desa Karangpucung</h5>
            <div class="fs-5">
                {!! $sambutan->body !!}
            </div>
        </div>
    </div>
</section>

<section id="peta" class="peta mt-5">
    <h2 class="h1 text-danger fw-bold">Peta Desa</h2>
    <p class="lead">Menampilkan Peta Desa Dengan <span class="fst-italic">Interest Point</span> Desa Karangpucung</p>

    <div class="ratio ratio-16x9">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.9778132392103!2d108.89984370209338!3d-7.413218866225174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e657e805ab3944f%3A0xc42d6a93a427717c!2sBalai%20Desa%20Karangpucung!5e0!3m2!1sid!2sid!4v1736462630954!5m2!1sid!2sid"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section id="administrasi" class="administrasi mt-5">
    <h2 class="h1 text-danger fw-bold">Administrasi Penduduk</h2>
    <p class="lead">Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan
        dan pendayagunaannya untuk pelayanan publik yang efektif dan efisien
    </p>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($admp as $adm)
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->penduduk }}</div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Penduduk</div>
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->laki_laki }}</div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Laki - Laki</div>
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->kepala_keluarga }}</div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Kepala Keluarga</div>
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->perempuan }}</div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Perempuan</div>
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->penduduk_sementara }}
                </div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Penduduk Sementara</div>
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <div class="bg-danger d-inline py-2 px-4 fs-2 fw-bold text-white">{{ $adm->mutasi_penduduk }}</div>
                <div class="shadow d-inline py-2 px-4 fs-2 fw-bold">Mutasi Penduduk</div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section id="apb" class="apb mt-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="/assets/img/apb/logo.png" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <h2 class="h1 text-danger fw-bold">APB DESA {{ date('Y') }}</h2>
            <p class="lead">
                Akses cepat dan transparan terhadap APB Desa serta proyek pembangunan
            </p>

            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Pendapatan Desa</h5>
                            <p class="card-text text-end fw-bolder fs-1 text-secondary">
                                Rp. {{ number_format($apbdes->pendapatan, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Belanja Desa</h5>
                            <p class="card-text text-end fw-bolder fs-1 text-secondary">
                                Rp. {{ number_format($apbdes->belanja, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="berita" class="berita mt-5">
    <h1 class="text-danger mt-4 fw-bold">Berita Desa</h1>
    <p class="fs-5">Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari
        Desa Karangpucung</p>

    <!-- Content -->

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($posts as $post)
        <div class="col">
            <div class="card">
                <a href="/berita/{{ $post->slug }}">
                    <img src="{{ asset('storage/' . $post->img) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($post->context), 200) }}
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
                            <!-- {{ $post->created_at->format('d F Y') }} -->
                            {{ $post->created_at->translatedFormat('d F Y') }}

                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="/berita" class="text-dark fs-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-text"
                viewBox="0 0 16 16">
                <path
                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z" />
                <path
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
            </svg>
            Lihat berita lebih banyak
        </a>
    </div>
</section>

<section id="potensi" class="potensi mt-5 mb-5">
    <h1 class="text-danger mt-4 fw-bold">Potensi Desa</h1>
    <p class="fs-5">Informasi tentang potensi dan kemajuan Desa di berbagai bidang seperti ekonomi, pariwisata,
        pertanian, industri kreatif, dan kelestarian lingkungan</p>

    <!-- Content -->

    <div class="row row-cols-2 row-cols-md-3 g-4 mb-5">
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
        <a href="/potensi-desa/categories" class="text-dark fs-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-text"
                viewBox="0 0 16 16">
                <path
                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z" />
                <path
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
            </svg>
            LIHAT POTENSI LEBIH BANYAK
        </a>
    </div>
</section>
@endsection
