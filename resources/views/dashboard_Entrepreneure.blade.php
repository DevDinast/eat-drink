<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - Entrepreneur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <h1>Eat&Drink - Espace Entrepreneur</h1>
    </header>

    <div class="container" style="width: 800px;">
        <div class="presentation dashboard-container">
            <h2>Bienvenue {{ Auth::user()->nom_responsable }}</h2>

            <p>✅ Votre demande a été approuvée.</p>
            <p>Vous pouvez maintenant gérer votre stand et vos produits.</p>
            <a href="{{ route('entrepreneur_produits') }}" class="btn">Accéder à mes produits</a>
            <section class="stand-info">
    <h2>Mon Stand</h2>

    @if(Auth::user()->stand)
        <p><strong>Nom :</strong> {{ Auth::user()->stand->nom }}</p>
        <p><strong>Description :</strong> {{ Auth::user()->stand->description }}</p>
        <p><strong>Statut :</strong> {{ ucfirst(Auth::user()->stand->statut) }}</p>

        @if(Auth::user()->stand->photo)
            <p><strong>Photo :</strong></p>
            <img src="{{ asset('storage/' . Auth::user()->stand->photo) }}" alt="Photo du stand" width="250">
        @endif

        <a href="{{ route('stand_edit') }}" class="btn">Modifier le stand</a>
    @else
        <p>Vous n'avez pas encore créé de stand.</p>
        <a href="{{ route('stand_create') }}" class="btn">Créer un stand</a>
    @endif
</section>


        </div>
    </div>

    <footer>
        &copy; 2025 Eat&Drink. Tous droits réservés.
    </footer>

</body>
</html>
