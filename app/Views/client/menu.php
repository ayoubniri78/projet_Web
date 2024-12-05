<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RestoMA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>" />
  <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/responsive.css') ?>" rel="stylesheet" />
  <style>
    /* Search Bar */
    .search-bar input {
      border-radius: 20px;
      padding: 8px 15px;
      border: 1px solid #ccc;
    }

    .search-bar button {
      background-color: #f8c291;
      border: none;
      color: white;
      border-radius: 20px;
      padding: 8px 15px;
      transition: background-color 0.3s ease;
    }

    .search-bar button:hover {
      background-color: #e67e22;
    }

    /* Menu Styles */
    .card {
      border: none;
      border-radius: 10px;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card img {
      border-radius: 10px 10px 0 0;
    }

    .card .btn-primary {
      background-color: #f8c291;
      border: none;
      transition: background-color 0.3s ease;
    }

    .card .btn-primary:hover {
      background-color: #e67e22;
    }

    /* Panier Styles */
    .panier-container {
      position: fixed;
      top: 70px;
      right: 20px;
      width: 320px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .panier-header {
      background-color: #f8c291;
      color: white;
      text-align: center;
      padding: 10px;
      border-radius: 10px 10px 0 0;
    }

    .panier-body {
      padding: 10px;
      max-height: 300px;
      overflow-y: auto;
    }

    .panier-body ul {
      list-style: none;
      padding: 0;
    }

    .panier-body li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      border-bottom: 1px solid #ddd;
    }

    .panier-body li:last-child {
      border-bottom: none;
    }

    .panier-footer {
      padding: 10px;
      text-align: center;
      background-color: #f8f9fa;
      border-radius: 0 0 10px 10px;
    }

    .panier-footer .btn-success {
      background-color: #2ecc71;
      border: none;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .panier-footer .btn-success:hover {
      background-color: #27ae60;
    }

    /* Footer Styles */
    footer {
      background-color: #343a40;
      color: white;
      padding: 20px 0;
    }

    footer h5 {
      font-size: 18px;
      margin-bottom: 15px;
      color: #f8c291;
    }

    footer ul {
      list-style: none;
      padding: 0;
    }

    footer ul li {
      margin-bottom: 10px;
      font-size: 14px;
    }

    footer ul li a {
      color: #ddd;
      text-decoration: none;
    }

    footer ul li a:hover {
      color: #f8c291;
    }

    /* Style général pour le conteneur des produits */
    .row {
      margin: 0 auto;
      justify-content: center;
    }

    /* Style des cartes produits */
    .card {
      border: 1px solid #ddd;
      /* Bordure légère */
      border-radius: 10px;
      /* Coins arrondis */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Ombre douce */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
      /* Coupe les débordements */
    }

    .card:hover {
      transform: translateY(-5px);
      /* Légère élévation au survol */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      /* Accentuation de l'ombre */
    }

    /* Image des produits */
    .card img {
      max-height: 200px;
      /* Fixe une hauteur pour les images */
      width: 100%;
      /* Les images prennent toute la largeur */
      object-fit: cover;
      /* Ajustement pour que l'image soit bien cadrée */
      border-bottom: 1px solid #ddd;
      /* Séparation avec le contenu */
    }

    /* Titre des produits */
    .card-title {
      font-size: 1.2rem;
      color: #333;
      font-weight: bold;
      margin-top: 10px;
    }

    /* Texte descriptif */
    .card-text {
      color: #666;
      font-size: 0.9rem;
      margin: 5px 0;
    }

    /* Prix */
    .card-text:nth-child(3) {
      font-size: 1rem;
      font-weight: bold;
      color: #e67e22;
      /* Couleur accentuée pour le prix */
    }

    /* Stock */
    .card-text:nth-child(4) {
      font-size: 0.9rem;
      color: #27ae60;
      /* Vert pour une bonne disponibilité */
    }

    /* Bouton Ajouter au panier */
    .btn-primary {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 0.9rem;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #2980b9;
      /* Couleur légèrement plus sombre au survol */
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- Header Section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="<?= base_url('/client/index') ?>">
          RestoMA
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

  <!-- Main Content Section (Menu and Panier) -->
  <div class="container-fluid main-container">
    <!-- Menu Section -->
    <div class="menu-container">
      <div class="row" id="products-container">

        <!-- Produit 2 -->
        <div class="container-fluid">
          <div class="row">
            <!-- Section des produits -->
            <div class="col-lg-9">
              <div class="row">
                <?php foreach ($article as $item): ?>
                  <div class="col-md-6 mb-4">
                    <div class="card h-100 text-center">
                      <div class="card-body">
                        <a href="<?= site_url('article/detail/' . $item['id']) ?>">
                          <img src="<?= base_url('uploads/' . esc($item['image'])) ?>" class="card-img-top"
                            alt="<?= esc($item['nom']) ?>" style="height: 200px; object-fit: cover;">
                          <h5 class="card-title"><?= esc($item['nom']) ?></h5>
                        </a>
                        <p class="card-text"><?= esc($item['description']) ?></p>
                        <p class="card-text"><?= $item['prix'] ?>€</p>
                        <p class="card-text"><strong>Stock :</strong> <?= $item['stock'] ?> unités</p>
                        <button class="btn btn-primary"
                          onclick="addToCart('<?= esc($item['nom']) ?>', <?= $item['prix'] ?>, <?= $item['stock'] ?>, <?= $item['id'] ?>)">
                          Ajouter au panier
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Section du panier -->
            <div class="col-lg-3">
              <div id="fixed-cart" class="bg-light p-3 rounded shadow">
                <!-- Contenu du panier -->
                <h5 class="text-center">Votre Panier</h5>
                <div id="cart-items">
                  <!-- Exemple de contenu de panier -->
                  <p>chocolat chaud3 - 5 x 12€</p>
                </div>
                <h5 id="total-price" class="text-success">Total: 0€</h5>
                <a href="<?= base_url('/client/panier') ?>" onclick="commander(event)">
                  <button class="btn btn-success w-100">Commander</button>
                </a>
              </div>
            </div>
          </div>
        </div>



        <!-- Panier Section -->
        <!-- <div class="panier-container-wrapper">
          <div class="panier-container">
            <div class="panier-header">
              <h4>Votre Panier</h4>
            </div>
            <div class="panier-body">
              <ul id="cart-items" class="list-group"></ul>
            </div>
            <div class="panier-footer">
              <h5 id="total-price" class="text-success">Total: 0€</h5>
              <a href="<?= base_url('/client/panier') ?>" onclick="commander(event)">
                <button class="btn btn-success w-100 mt-2">Commander</button>
              </a>
            </div>
          </div>
        </div> -->

        <!-- Formulaire de confirmation de commande -->
        <form action="/enregistrecommande" method="POST">
          <input type="hidden" id="cartIds" name="cart_ids" />
          <input type="hidden" id="cartQuantities" name="cart_quantities" />
          <input type="hidden" id="cartPrices" name="cart_prices" />
          <input type="hidden" id="totalAmount" name="montant_total" />

          <button type="submit" class="btn btn-primary">Soumettre le paiement</button>
        </form>

        <!-- Footer Section -->
        <footer class="bg-dark text-white py-5">
          <div class="container">
            <div class="row">
              <!-- About Section -->
              <div class="col-md-4">
                <h5 class="text-uppercase">À propos</h5>
                <p>Bienvenue dans notre restaurant ! Commandez en ligne et profitez de plats savoureux préparés avec
                  soin.</p>
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

            <div class="text-center py-3">
              <p>&copy; 2024 RestoMA. Tous droits réservés.</p>
            </div>
          </div>
        </footer>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script>
          // Code JavaScript pour gérer le panier
          let cart = JSON.parse(localStorage.getItem('cart')) || [];

          function addToCart(name, price, stock, id) {
            const itemInCart = cart.find(item => item.id === id);
            if (!itemInCart) {
              if (stock > 0) {
                cart.push({ name, price, stock, quantity: 1, id });
                saveCartToLocalStorage();
              } else {
                alert("Stock insuffisant !");
              }
            } else {
              if (itemInCart.quantity < itemInCart.stock) {
                itemInCart.quantity++;
                saveCartToLocalStorage();
              } else {
                alert("Stock insuffisant pour ajouter plus de cet article.");
              }
            }
            updateCart();
          }

          function updateCart() {
            const cartItemsContainer = document.getElementById("cart-items");
            cartItemsContainer.innerHTML = "";
            let total = 0;
            cart.forEach(item => {
              const li = document.createElement("li");
              li.classList.add("list-group-item");
              li.innerHTML = `
            ${item.name} - ${item.quantity} x ${item.price}€ 
            <button class="btn btn-sm btn-warning" onclick="decreaseQuantity(${item.id})">-</button>
            <button class="btn btn-sm btn-success" onclick="increaseQuantity(${item.id})">+</button>
            <span>Total: ${item.quantity * item.price}€</span>
        `;
              cartItemsContainer.appendChild(li);
              total += item.quantity * item.price;
            });

            document.getElementById("total-price").textContent = `Total: ${total}€`;
            localStorage.setItem('total', total);

            saveCartToLocalStorage();
          }

          function increaseQuantity(id) {
            const item = cart.find(item => item.id === id);
            if (item.quantity < item.stock) {
              item.quantity++;
              saveCartToLocalStorage();
              updateCart();
            } else {
              alert("Stock insuffisant pour augmenter la quantité.");
            }
          }

          function decreaseQuantity(id) {
            const item = cart.find(item => item.id === id);
            if (item.quantity > 1) {
              item.quantity--;
            } else {
              cart = cart.filter(item => item.id !== id);
            }
            saveCartToLocalStorage();
            updateCart();
          }

          function saveCartToLocalStorage() {
            localStorage.setItem('cart', JSON.stringify(cart));
          }

          function submitCartData() {
            const cartIds = cart.map(item => item.id).join(',');
            const cartQuantities = cart.map(item => item.quantity).join(',');
            const cartPrices = cart.map(item => item.price).join(',');

            document.getElementById('cartIds').value = cartIds;
            document.getElementById('cartQuantities').value = cartQuantities;
            document.getElementById('cartPrices').value = cartPrices;
            document.getElementById('totalAmount').value = localStorage.getItem('total');
          }

          document.addEventListener('DOMContentLoaded', function () {
            updateCart();
          });
        </script>


</body>

</html>