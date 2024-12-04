<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes Disponibles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: none;
            border-radius: 10px;
            /* Réduit légèrement les bords */
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            /* Ajout d'une ombre plus marquée pour le hover */
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            font-size: 1.25rem;
            /* Augmenter la taille du titre pour plus de lisibilité */
            padding: 10px 15px;
            border-radius: 10px 10px 0 0;
        }

        .status {
            font-size: 0.9rem;
            padding: 0.25rem 0.6rem;
            /* Augmenter légèrement les espacements */
            border-radius: 12px;
            /* Coins plus arrondis */
            color: #fff;
            font-weight: bold;
        }

        .status.en-attente {
            background-color: #ffc107;
        }

        .status.livree {
            background-color: #28a745;
        }

        .status.echouee {
            background-color: #dc3545;
        }

        .action-buttons .btn {
            margin-right: 8px;
            /* Augmenter l'espacement entre les boutons */
            font-size: 0.9rem;
            /* Réduire la taille de police pour les boutons */
            padding: 8px 16px;
            /* Augmenter la taille des boutons pour plus de confort */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .action-buttons .btn:hover {
            transform: scale(1.1);
            /* Agrandir légèrement le bouton au survol */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Media query pour une meilleure réactivité */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }

            .card-header {
                font-size: 1.1rem;
                padding: 8px 12px;
            }

            .action-buttons .btn {
                font-size: 0.85rem;
                padding: 7px 14px;
            }

            .card-body {
                padding: 15px;
                /* Espacement plus large à l'intérieur de la carte */
            }
        }
    </style>

</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Commandes Disponibles</h1>

        <div class="row">
            <?php foreach ($commandes as $commande): ?>
                <div class="card" id="commande-<?= $commande['id'] ?>">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Commande #<?= $commande['id'] ?></h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Adresse :</strong> <?= $commande['adresse'] ?></p>
                        <p><strong>Montant Total :</strong> <?= $commande['montant_total'] ?> DH</p>
                        <p>
                            <strong>Statut :</strong> <?= $commande['status'] ?>
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <div class="action-buttons">
                            <a href="<?= site_url('livreur/prendreCommande/' . $commande['id']) ?>"
                                class="btn btn-primary btn-sm">Prendre la commande</a>
                            <button class="btn btn-danger btn-sm" onclick="ignorerCommande(<?= $commande['id'] ?>)">Ignorer
                                la commande</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        function ignorerCommande(commandeId) {
            // Sélectionnez l'élément correspondant à la commande et masquez-le
            const commandeElement = document.getElementById(`commande-${commandeId}`);
            if (commandeElement) {
                commandeElement.style.display = 'none';
            } else {

            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>