@extends('layouts.layout')

@section('title', 'Liste des Posts')

@section('content')
    <h1>Liste des Posts</h1>

    <a href="{{ route('posts.create') }}" class="button">Créer un nouveau post</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->status }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="button">Modifier</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: #d9534f;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
