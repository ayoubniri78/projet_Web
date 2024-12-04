<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer la livraison</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Confirmer la livraison</h1>

        <div class="card">
            <div class="card-body">
                <?php if (isset($commande) && !empty($commande)): ?>
                    <p><strong>Commande #:</strong> <?= esc($commande['id']) ?></p>
                    <p><strong>Adresse :</strong> <?= esc($commande['adresse']) ?></p>
                    <p><strong>Montant Total :</strong> <?= esc($commande['montant_total']) ?> DH</p>
                <?php else: ?>
                    <p class="text-danger">Les informations de la commande sont introuvables.</p>
                <?php endif; ?>


                <div class="d-flex justify-content-center mt-4">
                    <a href="<?= site_url('livreur/markasLivree/' . $commande['id']) ?>"
                        class="btn btn-success me-3">Marquer comme livrée</a>
                    <a href="<?= site_url('livreur/showCommande') ?>" class="btn btn-danger">Annuler</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>