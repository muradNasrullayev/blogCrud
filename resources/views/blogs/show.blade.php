@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <h2>{{ $blog->title }}</h2>
    </div>

    <div class="mb-3">
        <strong>Description:</strong>
        <p class="mt-2">{{ $blog->description }}</p>
    </div>

    @if($blog->image)
        <div class="mb-3">
            <strong>Image:</strong><br>
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="Blog Image" class="img-fluid rounded shadow-sm mt-2" style="max-width: 400px;">
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">← Go back</a>
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
    </div>
@endsection
