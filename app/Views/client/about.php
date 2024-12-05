<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>RestoMA</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>" />
  <!-- Font Awesome -->
  <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
  <!-- Custom Stylesheet -->
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
  <!-- Responsive Stylesheet -->
  <link href="<?= base_url('css/responsive.css') ?>" rel="stylesheet" />
</head>

<body>

  <!-- Header Section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          RestoMA
        </a>
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
    </div>
  </header>
  <!--end header-->




  <!-- About Section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Sur nous</h2>
            </div>
            <p>
              Plongez au cœur de la culture culinaire marocaine avec notre site, votre destination en ligne pour
              savourer les délices authentiques du Maroc en France. Que vous soyez à la recherche de plats traditionnels
              faits maison, comme le couscous, le tajine ou les pâtisseries marocaines, ou d'ingrédients rares pour
              recréer ces recettes chez vous, nous avons tout ce qu'il vous faut.

              Nous sélectionnons soigneusement des produits de qualité, préparés avec des saveurs authentiques et des
              épices typiques du Maroc, pour vous offrir une expérience gastronomique inoubliable. Découvrez une large
              gamme de mets marocains prêts à être livrés directement à votre porte, où que vous soyez en France.
            </p>

          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="<?= base_url('img/about-img.png') ?>" alt="About Image">
          </div>
        </div>
      </div>
    </div>
  </section>

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
            <li><a href="<?= base_url('/client/index') ?>" class="text-white">Home</a></li>
            <li><a href="<?= base_url('/client/menu') ?>" class="text-white">Menu</a></li>
            <li><a href="<?= base_url('/client/about') ?>" class="text-white">About</a></li>
            <li><a href="<?= base_url('/client/contact') ?>" class="text-white">Contact</a></li>
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


  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.js') ?>"></script>

</body>

</html>