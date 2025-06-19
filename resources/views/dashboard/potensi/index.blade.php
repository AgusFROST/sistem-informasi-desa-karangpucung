@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Potensi</h1>
</div>

<a href="{{ route('potensi.create') }}" class="btn btn-primary mb-3">Tambah Potensi</a>

<div class="row">
    <div class="col-lg-8">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="/dashboard/potensi" method="GET">
            <div class="input-group mb-3 mt-3">
                <input type="search" name="search" class="form-control" placeholder="Cari judul..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Views</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($potensi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->views }}</td>
                    <td>
                        <a href="{{ route('potensi.edit', $item->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('potensi.destroy', $item->slug) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $potensi->links() }}
    </div>
</div>
@endsection
