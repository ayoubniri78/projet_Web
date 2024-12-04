<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChocoLux</title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>


<body>

  <!-- Header Section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="<?= base_url('/client/index') ?>">
          ChocoLux
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('/client/index') ?>">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/client/about') ?>"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/client/menu') ?>">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/client/contact') ?>">Contact Us</a>
            </li>
          </ul>
          <a href="<?= base_url('/client/panier') ?>">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Social Media Section -->
  <section class="social_media_section">
    <div class="container text-center">
      <h2>Suivez-nous sur</h2>
      <a href="https://www.facebook.com" target="_blank" class="social-link">
        <i class="fa fa-facebook fa-2x"></i>
      </a>
      <a href="https://www.instagram.com" target="_blank" class="social-link mx-4">
        <i class="fa fa-instagram fa-2x"></i>
      </a>
      <a href="https://wa.me/123456789" target="_blank" class="social-link">
        <i class="fa fa-whatsapp fa-2x"></i>
      </a>
    </div>
  </section>

  <script src="<?= base_url('js/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('js/bootstrap.js') ?>"></script>
  <script src="<?= base_url('js/custom.js') ?>"></script>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <!-- Footer Section -->
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-4">
          <h5 class="text-uppercase">À propos</h5>
          <p>
            Bienvenue dans notre restaurant ! Commandez en ligne et profitez de plats savoureux préparés avec soin.
          </p>
        </div>
        <!-- Quick Links -->
        <div class="col-md-2">
          <h5 class="text-uppercase">Liens rapides</h5>
          <ul class="list-unstyled">
            <li><a href="/client/index" class="text-white">Home</a></li>
            <li><a href="/client/menu" class="text-white">Menu</a></li>
            <li><a href="/client/about" class="text-white">About</a></li>
            <li><a href="/client/contact" class="text-white">Contact</a></li>
          </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-3">
          <h5 class="text-uppercase">Nous contacter</h5>
          <ul class="list-unstyled">
            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Rue 123, Ville, Pays</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> +212 123 456 789</li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i> contact@restaurant.com</li>
          </ul>
        </div>
        <!-- Opening Hours -->
        <div class="col-md-3">
          <h5 class="text-uppercase">Heures d'ouverture</h5>
          <ul class="list-unstyled">
            <li>Lundi - Vendredi : 10h - 22h</li>
            <li>Samedi - Dimanche : 11h - 23h</li>
          </ul>
        </div>
      </div>
      <hr class="bg-white">
      <div class="row">
        <!-- Social Media -->
        <div class="col-md-6 text-center text-md-left">
          <h6>Suivez-nous</h6>
          <a href="#" class="text-white me-3"><i class="fa fa-facebook"></i></a>
          <a href="#" class="text-white me-3"><i class="fa fa-twitter"></i></a>
          <a href="#" class="text-white me-3"><i class="fa fa-instagram"></i></a>
        </div>
        <!-- Copyright -->
        <div class="col-md-6 text-center text-md-right">
          <p>&copy; <span id="displayYear"></span> Tous droits réservés. Restaurant XYZ.</p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>