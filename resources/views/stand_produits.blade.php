
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits du stand {{ $stand->nom }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Produits du stand "{{ $stand->nom }}"</h1>
    <a href="{{ route('exposants') }}" class="btn">← Retour aux exposants</a>
</header>

<main class="container">
    @if($stand->produits->isEmpty())
        <p>Aucun produit disponible pour ce stand.</p>
    @else
        <div  class="produits-list">
            @foreach($stand->produits as $produit)
                <div style="margin-top: 70px; width: 450px; justify-content: space-between; border: solid 1px black; padding: 20px; border-radius: 10px; background-color: #fffffd; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) ;" class="produit-card">
                    <h2>{{ $produit->nom }}</h2>
                    <p>Description : {{ $produit->description }}</p>
                    <p>Prix : {{ $produit->prix }} €</p>
                    <p>Quantité disponible : {{ $produit->quantite }}</p>
                </div>
            @endforeach
        </div>
    @endif
</main>

<footer>
    &copy; 2025 Eat&Drink.
</footer>

</body>
</html>
