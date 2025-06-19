@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ url('/dashboard/ui/administrasi-penduduk/apbdes') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <div class="form-floating">
                    <input type="number" class="form-control" name="pendapatan" value="{{ $apbdes->pendapatan ?? '0' }}"
                        required>
                    <label class="form-label">Pendapatan</label>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <div class="form-floating">
                    <input type="number" class="form-control" name="belanja" value="{{ $apbdes->belanja ?? '0' }}"
                        required>
                    <label class="form-label">Belanja</label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        @endsection
    </div>
</div>
