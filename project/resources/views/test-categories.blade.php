<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ajoutez votre fichier CSS ici -->
</head>
<body>
    <div class="container">
        <h1>Liste des Catégories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de la Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter une Catégorie</a>
    </div>
</body>
</html>
