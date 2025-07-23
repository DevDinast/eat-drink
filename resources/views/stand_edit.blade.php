<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le stand</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Modifier mon stand</h1>
    <a href="{{ route('dashboard_Entrepreneure') }}" class="btn">← Retour</a>
</header>

<main class="container">
    <form action="{{ route('stand_update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nom">Nom du stand :</label>
        <input type="text" name="nom" value="{{ old('nom', $stand->nom) }}" required>

        <label for="description">Description :</label>
        <textarea name="description" rows="4">{{ old('description', $stand->description) }}</textarea>

        <label for="photo">Photo actuelle :</label><br>
        @if($stand->photo)
            <img src="{{ asset('storage/' . $stand->photo) }}" alt="Photo actuelle" width="200"><br>
        @else
            <p>Aucune photo</p>
        @endif

        <label for="photo">Nouvelle photo :</label>
        <input type="file" name="photo" accept="image/*">

        <button type="submit" class="btn">Mettre à jour</button>
    </form>

    <form action="{{ route('stand_delete') }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" style="background: red;">Supprimer le stand</button>
    </form>
</main>

<footer>
    &copy; 2025 Eat&Drink.
</footer>

</body>
</html>
