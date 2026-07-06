<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TokoKita</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">TokoKita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/buku">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peminjaman">Peminjaman</a>
                    </li>
                    @canany(['isAdmin', 'isPustakawan'])
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/peminjaman">Admin Peminjaman</a>
                        </li>
                    @endcanany
                    <li class="nav-item">
                        <a class="nav-link" href="/tentang">Tentang</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center p-4 mt-5 text-muted border-top">
        &copy; {{ date('Y') }} TokoKita. Hak Cipta Dilindungi.
    </footer>
</body>
</html>
