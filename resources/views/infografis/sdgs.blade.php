@extends('layouts.frontend')

@section('main')

@include('partials.frontend.menuInfografis')

<section id="sdgs" class="sdgs mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="h1 text-danger fw-bold text-uppercase">SDGs Desa
            </h2>
            <p class="lead">
                SDGs Desa mengacu pada upaya yang dilakukan di tingkat Desa untuk mencapai Tujuan Pembangunan Berkelanjutan (Sustainable Development Goals/SDGs). SDGs merupakan agenda global yang ditetapkan oleh Perserikatan Bangsa-Bangsa (PBB) untuk mengatasi berbagai tantangan sosial, ekonomi, dan lingkungan di seluruh dunia
            </p>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-6 px-4 py-2">
                        <h5 class="fw-bold">Skor SDGs Desa Karangpucung</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body text-end">
                            <p class="fw-bold fs-1">{{ $sdgsSkor->nilai ?? '0' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="/assets/img/infografis/sdgs.png" class="img-fluid">
        </div>
    </div>

</section>

<section id="sdgsAll" class="sdgs-all mt-5">
    <div class="row row-cols-2 row-cols-md-4 g-4">
        @foreach($sdgs as $sdg)
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $sdg->sdgsImg->img) }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">{{ $sdg->sdgsImg->title }}</h6>
                            <p class="card-text text-end">
                                Nilai : <span class="fw-bold fs-4">{{ $sdg->nilai }}</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
