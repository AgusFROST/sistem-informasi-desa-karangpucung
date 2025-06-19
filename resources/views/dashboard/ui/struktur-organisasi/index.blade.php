@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="{{ route('struktur.create') }}" class="btn btn-primary mb-3">Tambah Struktur</a>
    @endif



    <div class="row">
        <div class="col-lg-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('organisasi.index', $item->slug) }}" class="btn btn-primary btn-sm">View</a>


                                <a href="{{ route('struktur.edit', $item->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('struktur.destroy', $item->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
