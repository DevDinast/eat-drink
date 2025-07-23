<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Produits</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>Mes Produits</h1>
    <a href="{{ route('entrepreneure_create') }}" class="btn">Ajouter un produit</a>
</header>

<main class="container" style="margin-top: 70px; width: 600px; justify-content: space-between; border: solid 1px black; padding: 20px; border-radius: 10px; background-color: #fffffd; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) ;" >
    @if($produits->isEmpty())
        <p>Vous n'avez encore ajouté aucun produit.</p>
    @else
        <table >
            <thead>
                <tr >
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td style="text-align: center;">{{ $produit->description }}</td>
                        <td>{{ $produit->prix }} €</td>
                        <td>
                            @if($produit->photo)
                                <img src="{{ asset('storage/' . $produit->photo) }}" alt="photo" width="80">
                            @else
                                Aucune
                            @endif
                        </td>
                        <td>
                            <a style="text-decoration: none; color: blue;" href="{{ route('entrepreneur_produits', $produit) }}">Modifier</a> |
                            <form action="{{ route('entrepreneur_destroy', $produit) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button style="border: 1px solid red; background-color: red; width: 60px; height: 20px; border-radius: 5px;" type="submit" onclick="return confirm('Supprimer ce produit ?')">Supp</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>

<footer>
    &copy; 2025 Eat&Drink.
</footer>

</body>
</html>
