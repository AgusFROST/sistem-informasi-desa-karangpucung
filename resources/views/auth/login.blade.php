@extends('layouts.frontend')

@section('main')
<div class="container mt-5 login mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "Login Berhasil",
        text: "{{ session('success') }}",
        showConfirmButton: true,
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/dashboard'; // Arahkan ke dashboard setelah klik ok
        }
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "Login Gagal",
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
    @endif
</script>
@endsection
