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
            @if(Auth::check())
                @if(Auth::user()->statut === 'en_attente')
                    <p>Votre demande est encore en attente ⏳.</p>
                    <p>Merci de patienter pendant la vérification de votre profil par l'équipe d'administration.</p>
                @elseif(Auth::user()->statut === 'refuse')
                    <p class="text-danger">❌ Votre inscription a été <strong>refusée</strong>.</p>
                    <p>Contactez l'administration pour plus d'informations.</p>
                @elseif(Auth::user()->statut === 'approuve')
                    <p>✅ Félicitations ! Votre compte a été validé avec succès.</p>
                    <a href="{{ route('dashboard_Entrepreneure') }}" class="btn">Accéder à votre espace</a>
                @endif
            @else
                <p class="text-warning">⚠ Vous n’êtes pas connecté. Veuillez vous connecter pour voir votre statut.</p>
                <a href="{{ route('login') }}" class="btn">Retour à la connexion</a>
            @endif
        </div>
    </div>

    <footer>
        &copy; 2025 Eat&Drink. Tous droits réservés.
    </footer>

</body>
</html>
