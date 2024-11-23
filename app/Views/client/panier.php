<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="css/slick-theme.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
    <!-- Header Section -->
 <header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        ChocoLux
      </a>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

           
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.html">Menu</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        
          <a href ="panier.html">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

          </a>
        </div>
      </div>
 </header>
 <!--end header-->
    <div class="container mt-5">
        <h1 class="text-center text-danger mb-4">Panier</h1>

        <!-- Table du panier -->
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-danger">
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Les éléments du panier seront chargés ici -->
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <h2 class="text-success text-center" id="total-price">Total: $0</h2>

        <!-- Section Mode de paiement -->
        <div class="mt-5">
            <h3 class="text-center">Choose Payment Method</h3>
            <div class="d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="cash" value="Cash">
                    <label class="form-check-label" for="cash">Cash</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="card" value="Card">
                    <label class="form-check-label" for="card">Credit Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="PayPal">
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="d-flex justify-content-between mt-4">
            <a href="menu.html" class="btn btn-success">Continue Shopping</a>
            <button class="btn btn-primary" onclick="processPayment()">Checkout</button>
        </div>
    </div>

    <!-- Script -->
    <script>
        function loadCart() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const cartTable = document.getElementById('cart-items');
            let total = 0;

            cartItems.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.item}</td>
                    <td>$${item.price}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button>
                    </td>
                `;
                cartTable.appendChild(row);
                total += item.price;
            });

            document.getElementById('total-price').innerText = `Total: $${total}`;
        }

        function removeFromCart(index) {
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            cartItems.splice(index, 1); // Supprime l'élément
            localStorage.setItem('cart', JSON.stringify(cartItems)); // Met à jour le localStorage
            location.reload(); // Recharge la page
        }

        function processPayment() {
            const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');
            if (!selectedPaymentMethod) {
                alert("Please select a payment method.");
                return;
            }

            alert(`You selected ${selectedPaymentMethod.value} as your payment method.`);
            // Logique pour rediriger ou traiter le paiement
            localStorage.removeItem('cart'); // Vide le panier après le paiement
            window.location.href = "menu.html"; // Redirection après le paiement
        }

        loadCart();
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
          <li><a href="index.html" class="text-white">Home</a></li>
          <li><a href="menu.html" class="text-white">Menu</a></li>
          <li><a href="about.html" class="text-white">About</a></li>
          <li><a href="contact.html" class="text-white">Contact</a></li>
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
