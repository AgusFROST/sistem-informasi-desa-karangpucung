@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sejarah Desa</h1>
    </div>

    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="{{ route('sejarah-desa.create') }}" class="btn btn-primary mb-3">Tambah Sejarah Desa</a>
    @endif

    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Arsip</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sejarahDesa as $sejarah)
                            <tr>
                                <td>{{ $sejarah->name }}</td>
                                <td><a href="{{ Storage::url($sejarah->arsip) }}" target="_blank">Lihat Arsip</a></td>
                                <td>
                                    <a href="{{ route('sejarah-desa.edit', $sejarah->slug) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('sejarah-desa.destroy', $sejarah->slug) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
