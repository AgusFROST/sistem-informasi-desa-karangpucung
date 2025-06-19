@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <!-- isi -->
    <div class="col-lg-8">
        <div class="alert alert-dismissable alert-success alert-dismissible fade show" role="alert">

            <h4>Perhatian</h4>

            <h3>Selamat Datang di Dashboard Desa Karangpucung</h3>
            <p> Jaga Kerahasiaan Password Anda dengan baik. Penyalahgunaan Web Desa karena kelalaian Anda menjaga
                kerahasiaan
                password
                menjadi tanggung jawab Anda.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    </div>
@endsection
