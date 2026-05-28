@extends('layout.app') 

@section('content')
<div class="container py-5">
    <div class="p-5 mb-4 bg-light rounded-3 border shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-primary">Profil Pembuat</h1>
            <p class="col-md-8 fs-4 text-muted">
                Halo! Saya adalah pengembang di balik aplikasi ini. Fokus saya adalah membangun solusi 
                berbasis web yang efisien dengan teknologi terbaru seperti Laravel dan Bootstrap 5.
            </p>
            <hr class="my-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('profil.jpeg') }}"
                         class="rounded-circle img-thumbnail shadow-sm" 
                         style="width: 80px; height: 80px; object-fit: cover;">
                    
                </div>
                <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Elina Yulianti Meha</h5>
                    <p class="mb-0 text-secondary">Web Developer & Designer</p>
                </div>
            </div>
            <button class="btn btn-primary btn-lg mt-4" type="button">
                Lihat Portfolio
            </button>
        </div>
    </div>
</div>
@endsection