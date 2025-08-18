@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Redaktə et</h2>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">← Geri</a>
    </div>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-12">
            <label for="title" class="form-label">Başlıq</label>
            <input type="text" name="title" id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $blog->title) }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Məzmun</label>
            <textarea name="description" id="description" rows="5"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $blog->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="image" class="form-label">Şəkil</label>
            <input type="file" name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if($blog->image)
                <div class="mt-2">
                    <strong>Cari şəkil</strong><br>
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         alt="Current Image" class="img-fluid rounded shadow-sm mt-2" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Yenilə</button>
        </div>
    </form>
@endsection
