@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="name" value="{{ $product->description }}" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" required>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="text" class="form-control" name="image" value="{{ $product->image }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
