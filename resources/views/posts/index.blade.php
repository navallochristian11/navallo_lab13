@extends('layout')

@section('content')
<h1 class="mb-4">All Blog Posts</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

<ul class="list-group">
    @foreach ($posts as $post)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            <div>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
