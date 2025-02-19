@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Artikel</h2>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $article->title }}" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea class="form-control" name="content" rows="5" required>{{ $article->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image URL</label>
            <input type="text" class="form-control" name="image" value="{{ $article->image }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Article</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
