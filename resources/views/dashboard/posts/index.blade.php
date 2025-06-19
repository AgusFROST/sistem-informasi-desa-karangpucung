@extends('layouts.backend')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts</h1>
</div>

<a href="{{ url('/dashboard/posts/create') }}" class="btn btn-primary">Create Post</a>

<div class="row">
    <div class="col-lg-10">

        <form action="/dashboard/posts" method="GET">
            <div class="input-group mb-3 mt-3">
                <input type="search" name="search" class="form-control" placeholder="Cari judul..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>


        <table id="myTable" class="table table-striped display">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count() > 0)
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $posts->firstItem()+$loop->index }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->views }}</td>
                    <td>
                        <a href="/berita/{{ $post->slug }}" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </a>
                        <a href="{{ url('/dashboard/posts/' . $post->slug . '/edit') }}" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </a>
                        <form action="{{ url('/dashboard/posts/' . $post->slug) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">Belum ada postingan</td>
                </tr>
                @endif
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
</div>
@endsection

@section('sweetAlert2')
<script>
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "Berhasil!",
        text: "{{ session('success') }}",
        showConfirmButton: true
    });
    @endif
    @if(session('successHapus'))
    Swal.fire({
        icon: "success",
        title: "Berhasil dihapus!",
        text: "{{ session('successHapus') }}",
        showConfirmButton: true
    });
    @endif
    @if(session('error'))
    Swal.fire({
        icon: "error",
        title: "error!",
        text: "{{ session('Error') }}",
        showConfirmButton: true
    });
    @endif

    document.querySelectorAll('.btn-danger').forEach((button) => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah form submit langsung

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna klik 'Hapus', form akan disubmit
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
@endsection
