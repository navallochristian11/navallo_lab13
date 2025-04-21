@extends('layout')

@section('content')
<h1>Create Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title') }}"><br>
    @error('title') <div>{{ $message }}</div> @enderror

    <label>Body:</label><br>
    <textarea name="body">{{ old('body') }}</textarea><br>
    @error('body') <div>{{ $message }}</div> @enderror

    <button class="btn btn-primary" type="submit">Create</button>
</form>

<a href="{{ route('posts.index') }}">Back</a>
@endsection
