<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.css') ?>" />
  <!-- slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="<?= base_url('css/slick-theme.css') ?>" />
  <!-- font awesome style -->
  <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url('css/responsive.css') ?>" rel="stylesheet" />
</head>

<body>
  <!-- Header Section -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="<?= base_url('/client/index') ?>">ChocoLux</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="<?= base_url('/client/index') ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/client/about') ?>">About</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/client/menu') ?>">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/client/contact') ?>">Contact Us</a></li>
          </ul>
          <a href="<?= base_url('/client/panier') ?>">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </a>
        </div>
      </nav>
    </div>
  </header>
  <!-- End header -->

  <div class="container mt-5">
    <h1 class="text-center text-danger mb-4">Panier</h1>


    <!-- Total -->
    <h2 class="text-success text-center" id="total-price"></h2>

    <script>
      // Récupérer la valeur stockée dans localStorage
      let storedTotal = localStorage.getItem('total');

      // Mettre la valeur dans l'élément HTML avec l'id "total-price"
      document.getElementById('total-price').textContent = "Total: " + (storedTotal ? storedTotal : 0) + " EURO";

      // Mettre à jour le champ caché avec la valeur du total
      document.getElementById('totalAmount').value = storedTotal ? storedTotal : 0;
    </script>


    <!-- Formulaire de paiement avec informations de carte et adresse de livraison -->
    <!-- Formulaire de paiement avec informations de carte et adresse de livraison -->
    <?php
    if (session()->getFlashdata('error')) {
      echo session()->getFlashdata('error');
    }
    ?>
    <!-- Formulaire de confirmation de commande -->
    <form action="/enregistrecommande" method="POST" onsubmit="submitCartData()">
      <!-- Identifiants du panier -->
      <input type="hidden" id="cartIds" name="cart_ids" />
      <input type="hidden" id="cartQuantities" name="cart_quantities" />
      <input type="hidden" id="cartPrices" name="cart_prices" />
      <input type="hidden" id="totalAmount" name="montant_total" />

      <!-- Détails de la commande -->

      <!-- Détails de la commande -->
      <div class="form-group">
        <label for="cardNumber">Numéro de carte</label>
        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required placeholder="Numéro de carte"
          maxlength="16">
      </div>

      <div class="form-group">
        <label for="expiryDate">Date d'expiration</label>
        <input type="month" class="form-control" id="expiryDate" name="expiryDate" required>
      </div>

      <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" required placeholder="CVV" maxlength="3">
      </div>

      <!-- Détails d'adresse -->
      <div class="form-group">
        <label for="adresse">Adresse de livraison</label>
        <input type="text" class="form-control" id="adresse" name="adresse"
          value="<?= isset($adresse) ? esc($adresse['adresse']) : '' ?>" >
      </div>

      <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville"
          value="<?= isset($adresse) ? esc($adresse['ville']) : '' ?>" >
      </div>

      <div class="form-group">
        <label for="code_postal">Code postal</label>
        <input type="text" class="form-control" id="code_postal" name="code_postal"
          value="<?= isset($adresse) ? esc($adresse['code_postal']) : '' ?>" >
      </div>
      <!-- Affichage du montant total -->
      <div class="form-group">
        <label>Total de la commande</label>
        <p id="totalAmountDisplay" class="text-success"></p>
      </div>

      <button type="submit" class="btn btn-primary">Confirmer et Payer</button>
    </form>

    <script>
      // Mise à jour du montant total et des informations du panier dans le formulaire
      function submitCartData() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartIds = cart.map(item => item.id).join(',');
        const cartQuantities = cart.map(item => item.quantity).join(',');
        const cartPrices = cart.map(item => item.price).join(',');
        const totalAmount = localStorage.getItem('total') || 0;

        document.getElementById('cartIds').value = cartIds;
        document.getElementById('cartQuantities').value = cartQuantities;
        document.getElementById('cartPrices').value = cartPrices;
        document.getElementById('totalAmount').value = totalAmount;

        // Affichage du montant total sur la page
        document.getElementById('totalAmountDisplay').textContent = `${totalAmount} €`;
      }

      document.addEventListener('DOMContentLoaded', function () {
        submitCartData(); // Mettre à jour les données du panier lors du chargement de la page
      });
    </script>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>