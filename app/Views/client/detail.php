<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChocoLux</title>

    <!-- Lien vers Bootstrap (CSS) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome (pour les icônes) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
</head>

<body>

    <!-- Header -->
    <header class="header_section fixed-top bg-dark">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand text-white" href="<?= base_url('/client/index') ?>">ChocoLux</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../../logout">Logout</a>
                        </li>
                    </ul>
                    <a href="<?= base_url('/client/panier') ?>" class="text-white">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mt-5 pt-5">
        <h1><?= $article['nom'] ?></h1>
        <img src="<?= base_url('uploads/' . $article['image']) ?>" alt="Nom de l'article" class="img-fluid"
            style="max-width: 300px;">
        <p><strong>Description : </strong><?= $article['description'] ?>.</p>
        <p><strong>Prix : </strong><?= $article['prix'] ?> euro</p>
        <p><strong>Stock : </strong><?= $article['stock'] ?></p>

        <!-- Section pour afficher les étoiles -->
        <div class="rating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>

        <p><strong>Votre avis :</strong></p>
        <textarea id="review-text" rows="4" class="form-control" placeholder="Écrivez votre avis ici..."></textarea>

        <!-- Bouton pour soumettre le review -->
        <button id="submit-review" class="btn btn-primary mt-2" onclick="submitReview()">Envoyer votre avis</button>

        <p id="review-result"></p>



        <h3>Commandez cet article</h3>
        <a href="/client/menu">
            <button type="submit" class="btn btn-success">Commander</button>
        </a>
    </main>

    <!-- Footer -->
    <footer class="footer_section bg-dark text-white text-center py-4 mt-5">
        <p>&copy; 2024 ChocoLux | Tous droits réservés</p>
        <p>Suivez-nous sur <a href="#" class="text-white">Instagram</a> | <a href="#" class="text-white">Facebook</a>
        </p>
    </footer>

    <!-- Lien vers jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>

</body>

</html>