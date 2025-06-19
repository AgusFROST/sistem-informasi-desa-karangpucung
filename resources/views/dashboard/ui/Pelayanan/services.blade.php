@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="/dashboard/ui/pelayanan/create" class="btn btn-primary mb-3">Tambah Pelayanan</a>
    @endif

    <div class="row">
        <div class="col-lg-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelayanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelayanan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                <a href="/dashboard/ui/pelayanan/{{ $p->slug }}/edit"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="/dashboard/ui/pelayanan/{{ $p->slug }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
