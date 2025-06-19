@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <a href="{{ route('struktur.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="{{ route('organisasi.create', $struktur->slug) }}" class="btn btn-primary mb-3">Tambah Anggota</a>
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
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                @if ($item->img)
                                    <img src="{{ asset('storage/' . $item->img) }}" width="50">
                                @else
                                    Kosong
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('organisasi.edit', [$struktur->slug, $item->id]) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('organisasi.destroy', [$struktur->slug, $item->id]) }}"
                                    method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
