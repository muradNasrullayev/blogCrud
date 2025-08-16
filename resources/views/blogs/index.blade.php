@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Blog list</h2>
        <a href="{{ route('blogs.create') }}" class="btn btn-success">+ New blog</a>
    </div>

    {{-- Search və Date Filter --}}
    <form method="GET" action="{{ route('blogs.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                   placeholder="Axtar..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    {{-- Table --}}
    <table class="table table-bordered table-hover">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th width="200">operations</th>
        </tr>
        </thead>
        <tbody>
        @forelse($blogs as $key => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $key }}</td>
                <td>{{ $blog->title }}</td>
                <td>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Silinsin?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Blog not foung</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $blogs->appends(request()->input())->links() }}
    </div>
@endsection
