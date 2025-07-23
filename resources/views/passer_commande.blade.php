
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Passer commande - {{ $stand->nom }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Passer commande auprès du stand "{{ $stand->nom }}"</h1>
    <a href="{{ route('exposants') }}" class="btn">← Retour aux exposants</a>
</header>

<main class="container">
    <form method="POST" action="{{ route('commande.store', $stand->id) }}">
        @csrf

        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" id="nom" required>

        <label for="produit">Choisir un produit :</label>
        <select name="produit_id" id="produit" required>
            @foreach($stand->produits as $produit)
                <option value="{{ $produit->id }}">{{ $produit->nom }} ({{ $produit->prix }} €)</option>
            @endforeach
        </select>

        <label for="quantite">Quantité :</label>
        <input type="number" name="quantite" id="quantite" min="1" required>

        <button type="submit" class="btn">Commander</button>
    </form>
</main>

<footer>
    &copy; 2025 Eat&Drink.
</footer>

</body>
</html>
