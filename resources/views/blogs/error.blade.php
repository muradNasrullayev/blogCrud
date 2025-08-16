<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title -->
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <!-- Description -->
    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>
    @error('description')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <!-- Image -->
    <label>Image</label>
    <input type="file" name="image">
    @error('image')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <button type="submit">Save</button>
</form>



