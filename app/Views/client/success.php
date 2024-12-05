<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChocoLux</title>

    <!-- Lien vers Bootstrap (CSS) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header */
        .header_section {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .header_section a.navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .header_section a.nav-link {
            font-size: 1.1rem;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .header_section a.nav-link:hover {
            color: #f4a261 !important;
        }

        .header_section .fa-shopping-cart {
            font-size: 1.5rem;
            margin-left: 15px;
            transition: color 0.3s ease;
        }

        .header_section .fa-shopping-cart:hover {
            color: #f4a261;
        }

        /* Main Content */
        main {
            margin-top: 100px;
            text-align: center;
            padding: 50px 20px;
        }

        main h1 {
            color: #28a745;
            font-size: 2.5rem;
            margin-bottom: 20px;
            animation: fadeInDown 1.2s ease-in-out;
        }

        main p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        main a {
            display: inline-block;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        main a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Footer */
        .footer_section {
            background-color: #343a40;
            color: white;
            padding: 20px 10px;
            font-size: 0.9rem;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer_section a {
            color: #f4a261;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer_section a:hover {
            color: #ffd56b;
        }

        /* Animation */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="header_section fixed-top bg-dark">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand text-white" href="/client/index">RestoMA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="<?=base_url('/client/index')?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('/client/menu')?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('/client/menu')?>">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('/client/contact')?>">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('/logout')?>">Logout</a>
                        </li>
                    </ul>
                    <a href="#" class="text-white">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <h1>Paiement réussi !</h1>
        <p>Merci pour votre commande. Nous espérons vous revoir bientôt.</p>
        <a href="<?=base_url('/client/index')?>">Retour à l'accueil</a>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JS pour des fonctionnalités supplémentaires
        document.addEventListener('DOMContentLoaded', function () {
            console.log("Page chargée avec succès !");
        });

        // Exemple : Changer le style de la navbar au scroll
        window.addEventListener('scroll', function () {
            const header = document.querySelector('.header_section');
            if (window.scrollY > 50) {
                header.style.backgroundColor = '#1c1e21';
            } else {
                header.style.backgroundColor = 'transparent';
            }
        });
    </script>
</body>

</html>