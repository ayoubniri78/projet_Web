<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChocoLux</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>" />
  <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/responsive.css') ?>" rel="stylesheet" />
  <style>
    /* Panier fixe */
    .panier-container {
      position: fixed;
      top: 51px;
      right: 15px;
      width: 290px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1000;
    }

    .panier-header {
      background-color: #343a40;
      color: white;
      padding: 10px;
      border-radius: 8px 8px 0 0;
      text-align: center;
    }

    .panier-body {
      max-height: 400px;
      overflow-y: auto;
      padding: 10px;
    }

    .panier-footer {
      background-color: #f8f9fa;
      padding: 10px;
      border-radius: 0 0 8px 8px;
      text-align: center;
    }

    /* Mise en page divisé */
    .main-container {
      display: flex;
      justify-content: space-between;
      margin-top: 100px;
    }

    .menu-container {
      flex: 0 0 70%;
      /* La première partie, menu, prend 70% */
    }

    .panier-container-wrapper {
      flex: 0 0 28%;
      /* La deuxième partie, panier, prend 28% */
    }

    .search-bar {
      margin-left: auto;
      margin-right: auto;
      max-width: 400px;
    }
  </style>
</head>

<body>
  <!-- Header Section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="<?= base_url('/client/index') ?>">ChocoLux</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>
        <form class="d-flex search-bar">
          <input id="search-input" class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
          <button class="btn btn-outline-light" type="button" onclick="searchProduct()">Rechercher</button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('/client/index') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/client/about') ?>">About</a>
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

  <!-- Main Content Section (Menu and Panier) -->
  <div class="container-fluid main-container">
    <!-- Menu Section -->
    <div class="menu-container">
      <div class="row" id="products-container">

        <!-- Produit 2 -->
        <div class="row">
          <?php foreach ($article as $item): ?>
            <!-- Produit -->
            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card h-100 text-center">
                <!-- Affichage du nom de l'article -->
                <div class="card-body">
                  <h5 class="card-title"><?= esc($item['nom']) ?></h5>

                  <!-- Affichage de la description de l'article -->
                  <p class="card-text"><?= esc($item['description']) ?></p>

                  <!-- Affichage du prix -->
                  <p class="card-text"><?= $item['prix'] ?>€</p>

                  <!-- Ajouter au panier -->
                  <button class="btn btn-primary"
                    onclick="addToCart('<?= esc($item['nom']) ?>', <?= $item['prix'] ?>)">Ajouter au panier</button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Panier Section -->
    <div class="panier-container-wrapper">
      <div class="panier-container">
        <div class="panier-header">
          <h4>Votre Panier</h4>
        </div>
        <div class="panier-body">
          <ul id="cart-items" class="list-group"></ul>
        </div>
        <div class="panier-footer">
          <h5 id="total-price" class="text-success">Total: $0</h5>
          <button class="btn btn-success w-100 mt-2" onclick="commander()">Commander</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Section -->
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-4">
          <h5 class="text-uppercase">À propos</h5>
          <p>Bienvenue dans notre restaurant ! Commandez en ligne et profitez de plats savoureux préparés avec soin.</p>
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

      <div class="text-center py-3">
        <p>&copy; 2024 ChocoLux. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    let cart = [];

    function addToCart(name, price) {
      cart.push({ name, price });
      updateCart();
    }

    function updateCart() {
      const cartItemsContainer = document.getElementById("cart-items");
      cartItemsContainer.innerHTML = "";
      let total = 0;
      cart.forEach(item => {
        const li = document.createElement("li");
        li.classList.add("list-group-item");
        li.textContent = `${item.name} - $${item.price}`;
        cartItemsContainer.appendChild(li);
        total += item.price;
      });
      document.getElementById("total-price").textContent = `Total: $${total}`;
    }

    function commander() {
      alert("Merci pour votre commande !");
      cart = [];
      updateCart();
    }

    function searchProduct() {
      const query = document.getElementById("search-input").value;
      // Ajouter la logique de recherche ici
    }
  </script>
</body>

</html>