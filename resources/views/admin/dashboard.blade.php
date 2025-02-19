@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4 text-center"><i class="fas fa-tachometer-alt"></i>Beanie Admin Dashboard</h1>

    <div class="row">
        <!-- Card Manage Products -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x text-primary"></i>
                    <h5 class="card-title mt-3">Manage Products</h5>
                    <p class="card-text">Tambah, edit, dan hapus produk dengan mudah.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> Go to Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Manage Articles -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-3x text-success"></i>
                    <h5 class="card-title mt-3">Manage Articles</h5>
                    <p class="card-text">Kelola artikel dan berita terbaru.</p>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-success">
                        <i class="fas fa-arrow-right"></i> Go to Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
