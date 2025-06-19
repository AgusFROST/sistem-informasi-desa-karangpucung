<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Resmi Desa Karangpucung</title>

    <meta name="keywords" content="desa karangpucung, karangpucung, cilacap, jawa tengah, jateng">
    <meta name="author" content="Agus Sudarmanto">
    <meta name="robots" content="index, follow">

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

    <style>
        .error-page {
            min-height: 50vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        }

        .error-code {
            font-size: 8rem;
            font-weight: 900;
            color: #dc3545;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .glitch {
            animation: glitch 1s linear infinite;
        }

        @keyframes glitch {

            2%,
            64% {
                transform: translate(2px, 0) skew(0deg);
            }

            4%,
            60% {
                transform: translate(-2px, 0) skew(0deg);
            }

            62% {
                transform: translate(0, 0) skew(5deg);
            }
        }
    </style>
</head>

<body>
    <header>
        @include('partials.frontend.navbar')
    </header>

    <main class="container eror">
        <div class="error-page d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1 class="error-code glitch mb-4">@yield('code')</h1>
                <h2 class="display-6 mb-3">@yield('message')</h2>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/" class="btn btn-primary">Go Home</a>
                </div>
            </div>
        </div>
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
