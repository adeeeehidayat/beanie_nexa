<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header & Modal */
        .navbar {
            background-color: #ffffff; /* Putih */
            border-bottom: 2px solid #8B5E3C; /* Garis pembatas coklat */
        }
        .navbar-brand, .nav-link {
            color: #8B5E3C !important; /* Warna teks coklat */
        }
        .nav-link:hover {
            color: #a97c50 !important; /* Warna lebih terang saat hover */
        }
        .btn-login, .btn-register {
            background-color: #6f4f37; /* Coklat */
            color: white;
            border: 2px solid transparent;
            transition: background-color 0.3s, color 0.3s, border 0.3s;
        }

        .btn-login:hover, .btn-register:hover {
            background-color: white;
            color: #6f4f37; /* Coklat */
            border: 2px solid #6f4f37; /* Border coklat */
        }

        /* Tautan "Klik disini" */
        .text-brown {
            color: #6f4f37;
            text-decoration: none;
        }

        .text-brown:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Beanie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item">
                    @if(auth()->check())
                        <a class="nav-link" href="{{ route('cart.view') }}">Cart</a>
                    @else
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Cart</a>
                    @endif
                </li>
            </ul>

            @auth
                <!-- Jika user sudah login, tampilkan tombol logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill">Logout</button>
                </form>
            @else
                <!-- Jika user belum login, tampilkan tombol login -->
                <a href="#" class="btn btn-login px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-person-circle" style="font-size: 40px;"></i>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="loginUsername" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="loginUsername" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" placeholder="Password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login w-100">Login</button>
                </form>
                <p class="mt-3 text-center">Belum punya akun? 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" class="text-brown">Daftar disini</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Selamat Datang -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Selamat Datang!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-check-circle text-success" style="font-size: 50px;"></i>
                <p class="mt-3">Selamat datang di Online Beanie!</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-person-plus" style="font-size: 40px;"></i>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="registerUsername" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="registerUsername" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="registerEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="registerPassword" name="password" placeholder="Password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="registerPasswordConfirm" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="registerPasswordConfirm" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" class="btn btn-register w-100">Register</button>
                </form>
                <p class="mt-3 text-center">Sudah punya akun? 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" class="text-brown">Login disini</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Akun Baru -->
<div class="modal fade" id="newAccModal" tabindex="-1" aria-labelledby="newAccModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAccModalLabel">Akun Berhasil Dibuat!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-check-circle text-success" style="font-size: 50px;"></i>
                <p class="mt-3">Silahkan login dengan akun tersebut.</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Blog</h2>
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('blog.show', $article->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>

<!-- Footer -->
<div class="footer-border" style="border-top: 3px solid #8B4513;"></div> <!-- Garis Pembatas Coklat -->
<footer class="footer bg-white py-5">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Tentang Kami -->
            <div class="col-md-3">
                <h5>Tentang Kami</h5>
                <p>Kami adalah kedai kopi yang menyediakan berbagai jenis kopi terbaik dan layanan yang ramah. Kami berkomitmen untuk memberikan pengalaman terbaik bagi para pecinta kopi.</p>
            </div>

            <!-- Kolom 2: Link Cepat -->
            <div class="col-md-3">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark">Home</a></li>
                    <li><a href="#" class="text-dark">Shop</a></li>
                    <li><a href="#" class="text-dark">Blog</a></li>
                    <li><a href="#" class="text-dark">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Ikuti Kami -->
            <div class="col-md-3">
                <h5>Ikuti Kami</h5>
                <ul class="list-unstyled d-flex">
                    <li><a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="#" class="text-dark"><i class="bi bi-twitter"></i></a></li>
                </ul>
            </div>

            <!-- Kolom 4: Halaman Kedai Kopi -->
            <div class="col-md-3">
                <h5>Halaman Kedai Kopi</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark">Tentang Kami</a></li>
                    <li><a href="#" class="text-dark">Menu Kopi</a></li>
                    <li><a href="#" class="text-dark">Cara Pemesanan</a></li>
                    <li><a href="#" class="text-dark">Alamat Kedai</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4">
            <div class="col text-center">
                <p>&copy; 2025 Kedai Kopi. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>



@if(session('successLogin'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
        welcomeModal.show();
    });
</script>
@endif

@if(session('successRegister'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var newAccModal = new bootstrap.Modal(document.getElementById('newAccModal'));
        newAccModal.show();
    });
</script>
@endif

@if(session('loginModal'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
</script>
@endif

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
