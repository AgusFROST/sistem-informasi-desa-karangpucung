@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('sdgs.update') }}" method="POST">
    @csrf


    <!-- Input untuk SDGs Skor -->
    <div class="row">
        <div class="col-lg-4">
            <label for="sdgs_skor" class="form-label">SDGs Skor</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="sdgs_skor" id="sdgs_skor"
                    value="{{ $sdgsSkor->nilai ?? '0' }}" placeholder="Masukkan skor SDGs">
                <button class="btn btn-outline-primary" type="submit" id="button-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                        <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <hr class="my-1 mb-2">
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
                            <p class="card-text">
                                <input type="hidden" name="sdgs[{{ $loop->index }}][id]" value="{{ $sdg->id }}">
                                <input type="text" name="sdgs[{{ $loop->index }}][nilai]" class="form-control" value="{{ $sdg->nilai }}">
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <button type="submit" class="btn btn-primary mb-5">Simpan Perubahan</button>
</form>
@endsection
