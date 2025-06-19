@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<a href="/dashboard/ui/carausel/create" class="btn btn-primary mb-3">Add Carausel</a>

<div class="row">
    <div class="col-lg-8">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carausels as $carausel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/'.$carausel->img) }}" alt="Carausel" width="100"></td>
                    <td>
                        <a href="/dashboard/ui/carausel/{{ $carausel->id }}/edit"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="/dashboard/ui/carausel/{{ $carausel->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
