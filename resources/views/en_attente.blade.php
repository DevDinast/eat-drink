<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>En attente de validation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <h1>Eat&Drink - En attente de validation</h1>
    </header>

    <div class="container">
        <div class="presentation">
            @if(session('statut') === 'refuse')
                <h2>Merci pour votre inscription !</h2>
                <p>Mais nous sommes au regret de vous informer que votre inscription a été <strong>refusée</strong>.</p>
            @else
                <h2>Merci pour votre inscription !</h2>
                <p>Votre demande a bien été enregistrée.</p>
                <p>Elle est actuellement en cours de traitement par notre équipe.</p>
            @endif

            <a href="{{ route('login') }}" class="btn">Retour à la connexion</a>
        </div>
    </div>

    <footer>
        &copy; 2025 Eat&Drink. Tous droits réservés.
    </footer>

</body>
</html>
