<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Exposants</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Liste des exposants</h1>
    <a href="{{ route('dashboard_Entrepreneure') }}" class="btn">← Retour</a>
</header>

<main class="container">
    @if($stands->isEmpty())
        <p>Aucun stand pour le moment.</p>
    @else
        <div class="stands">
            @foreach($stands as $stand)
                <div class="stand-card">
                    <h2>{{ $stand->nom }}</h2>
                    @if($stand->photo)
                        <img src="{{ asset('storage/' . $stand->photo) }}" alt="Photo du stand" style="max-width: 300px;">
                    @endif
                    <p>{{ $stand->description }}</p>
                    <p><strong>Responsable :</strong> {{ $stand->user->name ?? 'Utilisateur inconnu' }}</p>
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
