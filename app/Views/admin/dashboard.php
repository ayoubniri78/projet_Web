<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.15);
        }

        table {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #343a40;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f3f5;
            cursor: pointer;
        }

        .table a {
            text-decoration: none;
            color: inherit;
        }

        .table a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Tableau de Bord Admin</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <a href="<?= base_url('/admin/listeArticle') ?>" class="card text-center p-4">
                    <h5 class="card-title">Total Articles</h5>
                    <p class="display-6"><?= $totalArticles ?></p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('/admin/listeArticle') ?>" class="card text-center p-4">
                    <h5 class="card-title">Articles Disponibles</h5>
                    <p class="display-6"><?= $articlesDisponible ?></p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('admin/commandes') ?>" class="card text-center p-4">
                    <h5 class="card-title">Total Commandes</h5>
                    <p class="display-6"><?= $totalCommandes ?></p>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $article['id'] ?></td>
                            <td><?= $article['nom'] ?></td>
                            <td><?= $article['description'] ?></td>
                            <td><?= $article['prix'] ?> euro</td>
                            <td><?= $article['stock'] ?></td>
                            <td>
                                <a href="<?= base_url('/admin/listeArticle/') ?>" class="btn btn-primary btn-sm">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>