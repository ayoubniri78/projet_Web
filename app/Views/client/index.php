<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChocoLux</title>
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <style>
    /* Ajout de l'espace pour le contenu après un header fixe */
    body {
      padding-top: 70px;
      /* Ajustez selon la hauteur du header */
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 24px;
    }

    .navbar .nav-link {
      margin-right: 15px;
    }

    .navbar .fa-shopping-cart {
      font-size: 20px;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <img src="<?= base_url('img/client-img.png') ?>" alt="">
  <!-- Header Section -->
  <header class="header_section fixed-top bg-dark">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand text-white" href="<?= base_url('/client/index') ?>">
          ChocoLux
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="<?= base_url('/client/index') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('/client/about') ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('/client/menu') ?>">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?= base_url('/client/contact') ?>">Contact Us</a>
            </li>
          </ul>
          <a href="<?= base_url('/client/panier') ?>" class="text-white">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </a>
        </div>
      </nav>
    </div>
  </header>
  <!-- End Header Section -->

  <!-- Slider Section -->
  <section class="slider_section">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="detail_box">
                  <h1>
                    Chocolate <br>
                    <span>Yummy</span>
                  </h1>
                </div>
              </div>
              <div class="col-md-4 ml-auto">
                <div class="img-box">
                  <img src="<?= base_url('img/slider-img.png') ?>" alt="slider">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add more carousel items here if needed -->
      </div>
    </div>
  </section>
  <!-- End Slider Section -->

  <!-- About Section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>About Our Company</h2>
            </div>
            <p>
              Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content
              here, content here', making it look like readable English.
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="<?= base_url('img/about-img.png') ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Footer Section -->
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-4">
          <h5 class="text-uppercase">About</h5>
          <p>Welcome to our restaurant! Order online and enjoy delicious meals carefully prepared.</p>
        </div>
        <!-- Quick Links -->
        <div class="col-md-2">
          <h5 class="text-uppercase">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="<?= base_url('/client/index') ?>" class="text-white">Home</a></li>
            <li><a href="<?= base_url('/client/menu') ?>" class="text-white">Menu</a></li>
            <li><a href="<?= base_url('/client/about') ?>" class="text-white">About</a></li>
            <li><a href="<?= base_url('/client/contact') ?>" class="text-white">Contact</a></li>
          </ul>
        </div>
        <!-- Contact -->
        <div class="col-md-3">
          <h5 class="text-uppercase">Contact</h5>
          <ul class="list-unstyled">
            <li><i class="fa fa-map-marker" aria-hidden="true"></i> 123 Street, City</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> +212 123 456 789</li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i> contact@restaurant.com</li>
          </ul>
        </div>
        <!-- Hours -->
        <div class="col-md-3">
          <h5 class="text-uppercase">Opening Hours</h5>
          <ul class="list-unstyled">
            <li>Mon-Fri: 10am - 10pm</li>
            <li>Sat-Sun: 11am - 11pm</li>
          </ul>
        </div>
      </div>
      <hr class="bg-white">
      <div class="row">
        <div class="col-md-6 text-center text-md-left">
          <h6>Follow Us</h6>
          <a href="#" class="text-white me-3"><i class="fa fa-facebook"></i></a>
          <a href="#" class="text-white me-3"><i class="fa fa-twitter"></i></a>
          <a href="#" class="text-white me-3"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="col-md-6 text-center text-md-right">
          <p>&copy; <span id="displayYear"></span> All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer Section -->

  <!-- jQuery -->
  <script src="<?= base_url('js/jquery-3.4.1.min.js') ?>"></script>
  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.js') ?>"></script>
  <!-- Custom JS -->
  <script src="<?= base_url('js/custom.js') ?>"></script>

</body>

</html>