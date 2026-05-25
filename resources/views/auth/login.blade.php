@extends('layout.app')

@section('title', 'Login Sistem')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="font-weight-light my-2">Login TokoKita - Katalog Buku</h3>
            </div>
            <div class="card-body">

                <form action="/login" method="POST">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-3">
                        <label class="form-label text-muted">Alamat Email</label>
                        <input type="email" name="email" 
                               class="form-control py-2 @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" 
                               required autofocus
                               placeholder="Masukkan email Anda">
                        <!-- Tampilkan error validasi jika email/password salah -->
                        @error('email')
                            <div class="invalid-feedback fw-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label class="form-label text-muted">Password</label>
                        <input type="password" name="password" 
                               class="form-control py-2 @error('password') is-invalid @enderror" 
                               required 
                               placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback fw-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fa-solid fa-sign-in-alt"></i> Login
                        </button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center py-3">
                <div class="small text-muted">
                    <p>Demo Akun Pustakawan:</p>
                    <code>Email: pustakawan@kampus.ac.id</code><br>
                    <code>Password: pustakawan123</code>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection