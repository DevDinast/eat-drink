<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eat&Drink Cotonou</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">


    <style>
       :root {
  --fond-page: #f8f1e9;
  --bloc-clair: #ffffff;
  --accent-doré: #e3b76c;
  --texte-foncé: #2c2c2c;
}

body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: var(--fond-page);
  color: var(--texte-foncé);
}

/* Hero Section */
.hero-section {
  height: 100vh;
  background: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
  padding-top: 80px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
}

/* Pourquoi Eat&Drink */
.pourquoi-section {
  background-color: var(--bloc-clair);
}

.pourquoi-section h2,
.features-section h5,
.footer-section .text-accent {
  color: var(--accent-doré);
}

.pourquoi-section .card,
.features-section .card {
  transition: transform 0.3s ease;
  background-color: var(--bloc-clair);
  border: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.pourquoi-section .card:hover,
.features-section .card:hover {
  transform: translateY(-5px);
}

/* Features Section */
.features-section {
  background-color: var(--fond-page);
}

/* Footer Section */
.footer-section {
  background-color: var(--bloc-clair);
  color: var(--texte-foncé);
}

.footer-section h5 {
  margin-bottom: 1rem;
}

.link-footer {
  color: var(--texte-foncé);
  transition: color 0.3s ease;
}

.link-footer:hover {
  color: var(--accent-doré);
  text-decoration: underline;
}

.footer-section .bi {
  transition: color 0.3s ease;
}

.footer-section .bi:hover {
  color: var(--accent-doré);
}


 </style>
</head>
<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
      <a class="navbar-brand fs-3 fw-bold" href="#">Eat&Drink</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarNav" aria-controls="navbarNav"
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-3">
          <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Nos Exposants</a></li>
          <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-light">Connexion</button>
          <button class="btn btn-warning">Devenir Exposant</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section text-white d-flex align-items-center">
    <div class="container text-center">
      <h1 class="mb-4">Découvrez les meilleurs artisans culinaires<br>et entrepreneurs de la région.</h1>
      <p class="lead mb-3">Une expérience gastronomique unique vous attend.</p>
      <p><strong>15-17 Mars 2024 • Centre des Congrès • 50+ Exposants</strong></p>
      <div class="mt-4 d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-primary btn-lg">Découvrir les Exposants</a>
        <a href="#" class="btn btn-outline-light btn-lg">Devenir Exposant</a>
      </div>
    </div>
  </section>

  <!-- Section Pourquoi Eat&Drink -->
  <section class="bg-light py-5 pourquoi-section">
    <div class="container">
      <h2 class="text-center fw-bold mb-4">Pourquoi Eat&Drink ?</h2>
      <p class="text-center mb-5 fs-5">Un événement unique qui rassemble la passion culinaire et l'excellence artisanale</p>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold">Artisans Culinaires</h5>
              <p class="card-text">Rencontrez les meilleurs chefs et artisans de la région qui vous feront découvrir leurs spécialités uniques.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold">Stands Variés</h5>
              <p class="card-text">Plus de 50 stands proposant une diversité de produits locaux, bio et artisanaux.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold">Commande Facile</h5>
              <p class="card-text">Système de commande simplifié pour réserver vos produits préférés directement sur place.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Qualité / Communauté / Événement -->
  <section class="bg-white py-5 features-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 text-center border-0 shadow">
            <div class="card-body">
              <h5 class="card-title fw-bold">Qualité Premium</h5>
              <p class="card-text">Tous nos exposants sont sélectionnés pour la qualité exceptionnelle de leurs produits.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center border-0 shadow">
            <div class="card-body">
              <h5 class="card-title fw-bold">Communauté</h5>
              <p class="card-text">Rejoignez une communauté passionnée de gourmets et de professionnels de l'art culinaire.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center border-0 shadow">
            <div class="card-body">
              <h5 class="card-title fw-bold">3 Jours d'Événement</h5>
              <p class="card-text">Trois jours complets pour découvrir, déguster et échanger avec nos artisans.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Footer Eat&Drink -->
  <footer class="footer-section py-5">
    <div class="container">
      <div class="row gy-4">
        <!-- Logo + Description -->
        <div class="col-md-3">
          <h4 class="fw-bold mb-3 text-accent">Eat&Drink</h4>
          <p>L'événement culinaire de référence qui rassemble les meilleurs artisans et entrepreneurs de la gastronomie.</p>
          <div class="d-flex gap-3 mt-3">
            <a href="#"><i class="bi bi-facebook text-accent fs-5"></i></a>
            <a href="#"><i class="bi bi-instagram text-accent fs-5"></i></a>
            <a href="#"><i class="bi bi-twitter text-accent fs-5"></i></a>
          </div>
        </div>

        <!-- Navigation -->
        <div class="col-md-3">
          <h5 class="fw-bold text-accent mb-3">Navigation</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none link-footer">Accueil</a></li>
            <li><a href="#" class="text-decoration-none link-footer">Nos Exposants</a></li>
            <li><a href="#" class="text-decoration-none link-footer">À propos</a></li>
            <li><a href="#" class="text-decoration-none link-footer">Contact</a></li>
          </ul>
        </div>

        <!-- Exposants -->
        <div class="col-md-3">
          <h5 class="fw-bold text-accent mb-3">Exposants</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none link-footer">Devenir Exposant</a></li>
            <li><a href="#" class="text-decoration-none link-footer">Espace Exposant</a></li>
            <li><a href="#" class="text-decoration-none link-footer">Conditions d’exposition</a></li>
            <li><a href="#" class="text-decoration-none link-footer">Tarifs</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="col-md-3">
          <h5 class="fw-bold text-accent mb-3">Contact</h5>
          <ul class="list-unstyled">
            <li>Email : <a href="#" class="link-footer">contact@eatdrink.fr</a></li>
            <li>Tél : <a href="#" class="link-footer">+33 1 23 45 67 89</a></li>
            <li>Add. : Centre des Congrès,<br>123 Avenue Culinaire, 75001 Paris</li>
          </ul>
        </div>
      </div>

      <hr class="mt-5">

      <div class="text-center small text-muted">
        © 2024 Eat&Drink. Tous droits réservés. | <a href="#" class="link-footer">Mentions légales</a> | <a href="#" class="link-footer">Politique de confidentialité</a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
</body>
</html>
