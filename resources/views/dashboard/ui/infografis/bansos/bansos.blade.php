@extends('layouts.backend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (auth()->check() && auth()->user()->role->name === 'Admin')
                <a href="/dashboard/ui/bansos/create" class="btn btn-primary mb-3">Tambah Bansos</a>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bansos</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bansos as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_bansos }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                <a href="/dashboard/ui/bansos/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="/dashboard/ui/bansos/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
