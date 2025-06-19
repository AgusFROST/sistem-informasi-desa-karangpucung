@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="row">
    <div class="col-lg-4">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('idm.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="idm_status_id" class="form-select" required>
                    <option value="" disabled {{ !isset($idm->idm_status_id) ? 'selected' : '' }}>Pilih Status</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ isset($idm->idm_status_id) && $idm->idm_status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->status }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Nilai</label>
                <input type="text" name="nilai" class="form-control"
                    value="{{ old('nilai', $idm->nilai ?? '0') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control"
                    value="{{ old('tahun', $idm->tahun ?? date('Y')) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
