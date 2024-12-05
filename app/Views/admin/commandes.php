<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Liste des Commandes</h1>

        <!-- Messages de succès ou d'erreur -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Code Postal</th>
                    <th>Montant Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande): ?>
                    <tr>
                        <td><?= $commande['id'] ?></td>
                        <td><?= $commande['user_id'] ?></td>
                        <td><?= $commande['adresse'] ?></td>
                        <td><?= $commande['ville'] ?></td>
                        <td><?= $commande['code_postal'] ?></td>
                        <td><?= $commande['montant_total'] ?>Euro</td>
                        <td><?= $commande['status'] ?? 'En attente' ?></td>
                        <td>
                            <a href="<?= base_url('/admin/commandes/markAsDelivered/' . $commande['id']) ?>"
                                class="btn btn-success btn-sm">
                                Marquer comme livrée
                            </a>
                            <a href="<?= base_url('/admin/commandes/delete/' . $commande['id']) ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>