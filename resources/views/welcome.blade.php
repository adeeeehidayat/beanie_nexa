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

        /* Section 1 */
        .hero-section {
            padding: 80px 0;
        }
        .hero-title {
            color: #8B5E3C;
            font-weight: bold;
        }
        .hero-desc {
            color: #5a3e2b;
            font-size: 18px;
        }
        .btn-order {
            background-color: #6f4f37; /* Coklat */
            color: white;
            border: 2px solid transparent;
            transition: background-color 0.3s, color 0.3s, border 0.3s;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-order:hover {
            background-color: white;
            color: #6f4f37; /* Coklat */
            border: 2px solid #6f4f37; /* Border coklat */
        }

        /* Section 5 */
        .feature-box {
            background-color: #ffffff;
            height: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .feature-box h4 {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .feature-box p {
            color: #555;
        }

        .section-title {
            font-size: 2rem;
            color: #4a4a4a;
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

<!-- Konten Pertama -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kiri: Gambar -->
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1643881578966-1d6ea6d20de7?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded" alt="Coffee Shop">
            </div>
            <!-- Kanan: Judul, Deskripsi, dan Button -->
            <div class="col-md-6">
                <h1 class="hero-title">Nikmati Secangkir Kopi Terbaik</h1>
                <p class="hero-desc">Rasakan kenikmatan kopi premium dengan aroma khas yang menggoda. Kami menghadirkan pengalaman ngopi terbaik untuk menemani hari-hari Anda.</p>
                <a href="{{ route('shop') }}" class="btn-order">Order Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Konten Kedua -->
<section class="about-section py-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title">Tentang Kedai Kopi Kami</h2>
        <p class="section-desc">Kami menyediakan berbagai varian kopi, mulai dari biji kopi berkualitas, kopi bubuk pilihan, hingga menu kopi siap saji yang nikmat.</p>

        <div class="row mt-4">
            <!-- Card 1: Biji Kopi -->
            <div class="col-md-4">
                <div class="card shadow-sm" style="height: 350px">
                    <img src="https://images.unsplash.com/photo-1634250531473-3bb5268ef394?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Biji Kopi" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">Biji Kopi</h5>
                        <p class="card-text">Biji kopi pilihan dari berbagai daerah dengan aroma khas dan kualitas terbaik.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Kopi Bubuk -->
            <div class="col-md-4">
                <div class="card shadow-sm" style="height: 350px">
                    <img src="https://images.unsplash.com/photo-1561113825-49e39f7e1f8f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Kopi Bubuk" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">Kopi Bubuk</h5>
                        <p class="card-text">Dengan berbagai tingkat kehalusan, cocok untuk berbagai metode seduh.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Menu Kopi Jadi -->
            <div class="col-md-4">
                <div class="card shadow-sm" style="height: 350px">
                    <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=1637&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Menu Kopi Jadi" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">Menu Kopi Jadi</h5>
                        <p class="card-text">Beragam menu kopi siap saji yang diseduh dengan teknik terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Ketiga: Shop Best Coffee -->
<section class="shop-section py-5">
    <div class="container text-center">
        <h2 class="section-title">Shop Best Coffee</h2>
        <p class="section-desc">Temukan berbagai pilihan kopi terbaik kami yang siap untuk dinikmati.</p>

        <!-- Carousel -->
        <div id="coffeeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products->chunk(3) as $index => $productChunk)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            @foreach ($productChunk as $product)
                                <div class="col-md-4">
                                    <div class="card shadow-sm">
                                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Kontrol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="prev" style="width: 40px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="next" style="width: 40px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Konten Keempat: Testimoni Kustomer -->
<section class="testimonials-section py-5">
    <div class="container text-center">
        <h2 class="section-title">Testimoni Kustomer</h2>
        <p class="section-desc">Apa kata kustomer kami tentang kedai kopi kami?</p>

        <!-- Carousel Testimoni -->
        <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Testimoni 1 -->
                <div class="carousel-item active">
                    <blockquote class="blockquote text-center" style="margin-bottom: 30px;">
                        <p class="mb-4" style="font-style: italic;">"Kopi di sini benar-benar enak, dan pelayanan yang ramah membuat pengalaman minum kopi jadi lebih menyenangkan. Pasti akan kembali lagi!"</p>
                        <footer class="blockquote-footer">Andi Prasetya</footer>
                    </blockquote>
                </div>
                <!-- Testimoni 2 -->
                <div class="carousel-item">
                    <blockquote class="blockquote text-center" style="margin-bottom: 30px;">
                        <p class="mb-4" style="font-style: italic;">"Salah satu kedai kopi terbaik di kota. Kopinya sangat aromatik dan suasana kedai yang nyaman membuat saya betah berlama-lama di sini."</p>
                        <footer class="blockquote-footer">Dian Lestari</footer>
                    </blockquote>
                </div>
                <!-- Testimoni 3 -->
                <div class="carousel-item">
                    <blockquote class="blockquote text-center" style="margin-bottom: 30px;">
                        <p class="mb-4" style="font-style: italic;">"Saya selalu merasa puas dengan setiap cangkir kopi di kedai ini. Selalu konsisten dalam rasa dan kualitas!"</p>
                        <footer class="blockquote-footer">Budi Santoso</footer>
                    </blockquote>
                </div>
            </div>

            <!-- Kontrol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev" style="z-index: 5;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next" style="z-index: 5;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Konten Keempat: Produk Baru dan Terlaris -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri: Produk Baru -->
            <div class="col-md-6">
                <h3 class="text-right mb-3">Produk Baru</h3>
                <div class="list-group">
                    <!-- Item Produk 1 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Arabika</h5>
                            <p class="mb-1">Kopi Arabika pilihan dengan rasa lembut dan aroma khas.</p>
                            <span class="badge bg-success">$15.00</span>
                        </div>
                    </div>
                    <!-- Item Produk 2 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Robusta</h5>
                            <p class="mb-1">Kopi Robusta dengan cita rasa kuat dan sedikit pahit.</p>
                            <span class="badge bg-success">$12.00</span>
                        </div>
                    </div>
                    <!-- Item Produk 3 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Liberika</h5>
                            <p class="mb-1">Kopi dengan rasa unik dan sedikit berasap.</p>
                            <span class="badge bg-success">$18.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Produk Terlaris -->
            <div class="col-md-6">
                <h3 class="text-right mb-3">Produk Terlaris</h3>
                <div class="list-group">
                    <!-- Item Produk 1 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Latte</h5>
                            <p class="mb-1">Kopi latte dengan susu creamy yang menyegarkan.</p>
                            <span class="badge bg-warning">$20.00</span>
                        </div>
                    </div>
                    <!-- Item Produk 2 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Cappuccino</h5>
                            <p class="mb-1">Kopi cappuccino dengan busa susu halus yang lezat.</p>
                            <span class="badge bg-warning">$22.00</span>
                        </div>
                    </div>
                    <!-- Item Produk 3 -->
                    <div class="list-group-item d-flex align-items-center">
                        <i class="bi bi-cup-hot" style="font-size: 40px; margin-right: 15px;"></i>
                        <div>
                            <h5 class="mb-1">Kopi Espresso</h5>
                            <p class="mb-1">Kopi espresso dengan rasa kuat dan penuh energi.</p>
                            <span class="badge bg-warning">$25.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Kelima: Keuntungan Kedai Kopi -->
<section class="features-section py-5">
    <div class="container text-center">
        <div class="row">
            <!-- Grid 1: Quick Delivery -->
            <div class="col-md-3 mb-4">
                <div class="feature-box p-4 border rounded">
                    <i class="bi bi-truck" style="font-size: 50px; color: #6c757d;"></i>
                    <h4 class="mt-3">Quick Delivery</h4>
                    <p>Pesan sekarang dan nikmati kopi Anda dengan pengiriman cepat di hari yang sama.</p>
                </div>
            </div>

            <!-- Grid 2: Pick Up in Store -->
            <div class="col-md-3 mb-4">
                <div class="feature-box p-4 border rounded">
                    <i class="bi bi-shop" style="font-size: 50px; color: #6c757d;"></i>
                    <h4 class="mt-3">Pick Up in Store</h4>
                    <p>Pesan kopi Anda dan ambil langsung di kedai kami, lebih cepat dan praktis.</p>
                </div>
            </div>

            <!-- Grid 3: No Shipping Charge -->
            <div class="col-md-3 mb-4">
                <div class="feature-box p-4 border rounded">
                    <i class="bi bi-bag" style="font-size: 50px; color: #6c757d;"></i>
                    <h4 class="mt-3">No Shipping Charge</h4>
                    <p>Nikmati pengiriman tanpa biaya tambahan untuk setiap pembelian kopi kami.</p>
                </div>
            </div>

            <!-- Grid 4: Friendly Service -->
            <div class="col-md-3 mb-4">
                <div class="feature-box p-4 border rounded">
                    <i class="bi bi-hand-thumbs-up" style="font-size: 50px; color: #6c757d;"></i>
                    <h4 class="mt-3">Friendly Service</h4>
                    <p>Pelayanan yang ramah dan siap membantu Anda menikmati pengalaman kopi yang menyenangkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Keenam: Read Our Blogs -->
<section class="blogs-section py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Read Our Blogs</h2>
        
        <!-- Carousel Artikel -->
        <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($articles->chunk(3) as $key => $articleChunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach ($articleChunk as $article)
                        <div class="col-md-4 mb-3">
                            <div class="card" style="height: 450px">
                                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                                <div class="card-body text-start">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                    <a href="{{ route('blog.show', $article->slug) }}" class="btn btn-dark">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Kontrol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev" style="width: 40px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next" style="width: 40px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Konten Ketujuh: Follow Our Instagram -->
<section class="instagram-section py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Follow Our Instagram</h2>
        
        <!-- Grid Gambar Instagram -->
        <div class="row">
            <!-- Gambar 1 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 1">
            </div>
            <!-- Gambar 2 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 2">
            </div>
            <!-- Gambar 3 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 3">
            </div>
            <!-- Gambar 4 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 4">
            </div>
            <!-- Gambar 5 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 5">
            </div>
            <!-- Gambar 6 -->
            <div class="col-md-2 col-4 mb-3">
                <img src="https://placehold.co/300" class="img-fluid" alt="Instagram Image 6">
            </div>
        </div>
    </div>
</section>

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
