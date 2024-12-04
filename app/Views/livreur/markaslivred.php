<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Livrée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h1>✅ Commande Livrée avec Succès !</h1>
            <p>Merci d'avoir livré cette commande.</p>
            <a href="<?= site_url('livreur/showCommande') ?>" class="btn btn-primary">Retour à la liste des
                commandes</a>
        </div>
    </div>
</body>

</html>