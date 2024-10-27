@extends('layouts.layout')

@section('title', 'Liste des Catégories')

@section('content')
    <h1>Liste des Catégories</h1>

    <a href="{{ route('categories.create') }}" class="button">Créer une nouvelle catégorie</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="button">Modifier</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
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
