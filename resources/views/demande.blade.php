<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demandes en attente</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <h1>Demandes de validation</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Entreprise</th>
                <th>Responsable</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($demandes as $user)
            <tr>
                <td>{{ $user->nom_entreprise }}</td>
                <td>{{ $user->nom_responsable }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telephone }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.demande.valider', $user->id) }}" style="display:inline">
                        @csrf
                        <button type="submit">Valider</button>
                    </form>

                    <form method="POST" action="{{ route('admin.demande.rejeter', $user->id) }}" style="display:inline">
                        @csrf
                        <button type="submit">Rejeter</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
