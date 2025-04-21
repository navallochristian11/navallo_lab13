@extends('layout')

@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>

<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>

<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete</button>
</form>

<a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
@endsection
