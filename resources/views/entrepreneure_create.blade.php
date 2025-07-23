<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Ajouter un produit</h1>
    <a href="{{ route('entrepreneur_produits') }}" class="btn">← Retour</a>
</header>

<main class="container">
    <form action="{{ route('entrepreneur_store') }}" method="POST">
        @csrf
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="description">Description :</label>
        <textarea name="description"></textarea>

        <label for="prix">Prix (FCFA) :</label>
        <input type="number" name="prix" step="0.01" required>

        <label for="quantite">Quantité :</label>
        <input type="number" name="quantite" required>

        <button type="submit" class="btn">Ajouter</button>
    </form>
</main>

<footer>
    &copy; 2025 Eat&Drink.
</footer>

</body>
</html>
