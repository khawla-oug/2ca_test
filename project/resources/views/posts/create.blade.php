@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    <form action="" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" required></textarea>
        </div>
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>
        <button type="submit">Create Post</button>
    </form>
@endsection
