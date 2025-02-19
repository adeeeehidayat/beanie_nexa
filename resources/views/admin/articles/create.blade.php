@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Artikel</h2>

    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="text" class="form-control" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Article</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
