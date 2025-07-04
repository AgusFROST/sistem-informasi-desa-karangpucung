@extends('layouts.frontend')

@section('main')
<section id="detail-pelayanan" class="detail-pelayanan mb-5">

    <div class="bg-white rounded px-4 py-4">
        {{-- Post Hero --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-house-door" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/pelayanan-desa">Pelayanan Desa</a>
                </li>
                <li class="breadcrumb-item active">{{ $pelayanan->name }}</li>
            </ol>
        </nav>

        <h1 class="text-danger mt-4 fw-bold">{{ $pelayanan->name }}</h1>
        <p class="fs-5">{!! $pelayanan->body !!}</p>
    </div>
</section>
@endsection