@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Produk</h2>

    {{-- Menampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="description" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" class="form-control" name="price" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" class="form-control" name="stock" required>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="text" class="form-control" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Produk</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
