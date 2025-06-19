@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="mb-3">
    <a href="{{ route('media-sosial.create') }}" class="btn btn-primary">Tambah Media Sosial</a>
</div>

<div class="row">
    <div class="col-lg-8">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>URL</th>
                    <th>Icon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mediaSosial as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->medsosSvg->name }}</td>
                    <td>{{ $item->url }}</td>
                    <td>{!! $item->medsosSvg->svg !!}</td>
                    <td>
                        <a href="{{ route('media-sosial.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('media-sosial.destroy', $item->id) }}" method="POST"
                            style="display:inline;">
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

@endsection