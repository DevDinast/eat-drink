<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Exposants</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Nos Exposants</h1>
</header>

<main class="container">
    @if($stands->isEmpty())
        <p>Aucun stand approuvé disponible pour le moment.</p>
    @else
        <div class="stands-list">
            @foreach($stands as $stand)
                <div class="stand-card">
                    @if($stand->photo)
                        <img src="{{ asset('storage/' . $stand->photo) }}" alt="Photo du stand {{ $stand->nom }}">
                    @endif
                    <h2>{{ $stand->nom }}</h2>
                    <p>{{ $stand->description }}</p>

                    <div class="card-actions">
                        <a href="{{ route('stand_produits', $stand->id) }}" class="btn">Voir les produits</a>
                        <a href="{{ route('stand_commande', $stand->id) }}" class="btn">Passer commande</a>


                    </div>
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
