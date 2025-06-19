<nav class="navbar navbar-expand-lg navbar-dark fw-bold fixed-top" id="utama">
    <div class="container">
        <?php $icon = App\Models\Icon::first(); ?>
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('storage/' . $icon->img) }}" alt="Logo" class="img-fluid me-2"
                style="width: 50px; height: auto;">
            <div>
                <div style="font-size: 1.2rem;">Desa Karangpucung</div>
                <small>Kabupaten Cilacap</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto nav-underline">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('profil-desa') ? 'active' : '' }}"
                        href="/profil-desa">Profil
                        Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white
                        {{ request()->is('infografis*') && !request()->is('infografis/idm') ? 'active' : '' }}"
                        href="/infografis/penduduk">Infografis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('infografis/idm*') ? 'active' : '' }}"
                        href="/infografis/idm">IDM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('berita*') ? 'active' : '' }}"
                        href="/berita">Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('pelayanan-desa*') ? 'active' : '' }}"
                        href="/pelayanan-desa">Pelayanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('peraturan*') ? 'active' : '' }}"
                        href="/peraturan">Peraturan</a>
                </li>

                {{-- @guest
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('login*') ? 'active' : '' }}" href="/login">Login</a>
                </li>
                @endguest --}}

                <!-- Tambahan menu dropdown jika user login -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
                                    <path
                                        d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5m-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                    <path
                                        d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/dashboard/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>