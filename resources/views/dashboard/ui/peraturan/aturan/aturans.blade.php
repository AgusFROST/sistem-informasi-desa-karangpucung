@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <a href="{{ url('/dashboard/ui/peraturan') }}" class="btn btn-secondary mb-3">Kembali</a>
    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="{{ url('/dashboard/ui/peraturan/' . $category->slug . '/create') }}" class="btn btn-primary mb-3">Tambah
            Aturan</a>
    @endif

    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Aturan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rules as $rule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rule->name }}</td>
                            <td>
                                <a href="{{ url('/dashboard/ui/peraturan/' . $category->slug . '/' . $rule->slug . '/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/dashboard/ui/peraturan/' . $category->slug . '/' . $rule->slug) }}"
                                    method="POST" class="d-inline">
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
