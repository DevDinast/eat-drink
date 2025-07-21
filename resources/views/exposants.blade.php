<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nos Exposants - Eat&Drink</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <header class="header">
    <h1>Nos Exposants</h1>
    <p>Découvrez les stands approuvés pour l'édition 2025 de Eat&Drink !</p>
  </header>

  <main class="grid-container">
    <!-- Exemple de carte exposant -->
    <div class="exposant-card">
      <img src="img/stand1.jpeg" alt="Stand La Crêperie du Soleil">
      <h3>La Crêperie du Soleil</h3>
      <p>Crêpes artisanales bretonnes sucrées & salées, 100% bio.</p>
      <a href="/stand/1" class="btn">Voir les produits</a>
    </div>

    <div class="exposant-card">
      <img src="img/stand2.jpeg" alt="Stand Saveurs Africaines">
      <h3>Saveurs Africaines</h3>
      <p>Plats traditionnels d’Afrique de l’Ouest préparés sur place.</p>
      <a href="/stand/2" class="btn">Voir les produits</a>
    </div>

    <!-- Répéter dynamiquement avec foreach en Laravel -->
  </main>

</body>
</html>
