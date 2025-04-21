@extends('layout')

@section('content')
<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title', $post->title) }}"><br>
    @error('title') <div>{{ $message }}</div> @enderror

    <label>Body:</label><br>
    <textarea name="body">{{ old('body', $post->body) }}</textarea><br>
    @error('body') <div>{{ $message }}</div> @enderror

    <button type="submit">Update</button>
</form>

<a href="{{ route('posts.index') }}">Back</a>
@endsection
