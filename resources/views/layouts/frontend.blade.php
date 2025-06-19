<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} Website Resmi Desa Karangpucung</title>

    <meta name="description" content="{{ $description }}">
    <meta name="keywords"
        content="Desa Karangpucung, Karangpucung, desa wisata, sejarah Desa Karangpucung, kebudayaan Karangpucung, potensi Desa Karangpucung, pengembangan desa, komunitas Karangpucung, desa kreatif, produk lokal Karangpucung, fasilitas Desa Karangpucung, peraturan desa Karangpucung, pemerintahan Desa Karangpucung, infrastruktur Karangpucung, SDM Desa Karangpucung, pendidikan Desa Karangpucung, pariwisata Karangpucung, desa mandiri Karangpucung, budaya lokal Karangpucung">
    <meta name="author" content="Agus Sudarmanto">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (SEO untuk Media Sosial - Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }} Website Resmi Desa Karangpucung">
    <meta property="og:description" content="{{ $description }}">
    @php
    $carausels = App\Models\Carausel::all();
    @endphp
    <meta property="og:image" content="{{ asset('storage/'.$carausels->first()->img) }}">
    <meta property="og:url" content="https://pemdes-karangpucung.com/">
    <meta property="og:site_name" content="{{ $title }} Website Resmi Desa Karangpucung">


    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">


    @include('partials.icon')


    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Cek jika lebar layar lebih dari 768px (desktop)
        if (window.innerWidth > 768) {
            const navbar = document.getElementById('utama');

            @if(request()->path() === '/')
                // Untuk halaman utama, ubah warna navbar berdasarkan scroll
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 0) {
                        navbar.classList.add('bg-danger');
                    } else {
                        navbar.classList.remove('bg-danger');
                    }
                });
            @else
                // Untuk halaman lainnya, langsung beri warna navbar
                navbar.classList.add('bg-danger');
            @endif
        } else {
            // Jika lebar layar kurang dari atau sama dengan 768px (mobile)
            const navbar = document.getElementById('utama');
            navbar.classList.add('bg-danger');
        }
    });
    </script>



</head>

<body>
    <header>
        @include('partials.frontend.navbar')


        @if (request()->is('/'))

        <section id="hero" class="hero bg-white">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($carausels as $index => $carausel)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                            style="background-color: #0d6efd;"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($carausels as $index => $carausel)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$carausel->img) }}" class="d-block w-100 "
                                alt="Carausel Image" style="filter: brightness(80%);">
                            <div class="carousel-caption d-md-block fw-bold">
                                <h1>Selamat Datang <br> Website Resmi Desa Karangpucung</h1>
                                <p>Sumber informasi terbaru tentang pemerintahan di Desa Karangpucung</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                            class="bi bi-caret-left-fill text-primary" viewBox="0 0 16 16">
                            <path
                                d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                            class="bi bi-caret-right-fill text-primary" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        @endif


    </header>

    <main class="container">
        @yield('main')
    </main>

    <footer>
        @include('partials.frontend.footer')
    </footer>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sweetalert2@11.js"></script>
    <script src="/assets/js/chart.js"></script>


    @yield('script')
    @yield('chart')
</body>

</html>