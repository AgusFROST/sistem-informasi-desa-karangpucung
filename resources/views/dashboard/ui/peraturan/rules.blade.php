@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (auth()->check() && auth()->user()->role->name === 'Admin')
        <a href="{{ url('/dashboard/ui/peraturan/create') }}" class="btn btn-primary mb-3">Tambah Kategori Peraturan</a>
    @endif

    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Peraturan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ url('/dashboard/ui/peraturan/' . $category->slug) }}"
                                    class="btn btn-info btn-sm">View</a>
                                <a href="{{ url('/dashboard/ui/peraturan/' . $category->slug . '/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/dashboard/ui/peraturan/' . $category->slug) }}" method="POST"
                                    class="d-inline">
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
