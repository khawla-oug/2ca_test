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
<form action="" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
</body>
</html>