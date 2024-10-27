@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>Category: {{ $post->category->name }}</p>
    <p>Status: {{ $post->status }}</p>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
