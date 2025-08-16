@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Yeni Blog Əlavə Et</h2>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">← Geri Qayıt</a>
    </div>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-12">
            <label for="title" class="form-label">Başlıq</label>
            <input type="text" name="title" id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Açıqlama</label>
            <textarea name="description" id="description" rows="5"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Yadda Saxla</button>
        </div>
    </form>
@endsection
