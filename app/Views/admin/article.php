<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            width: 80%;
            margin: 50px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        td {
            background-color: #fff;
        }

        td img {
            width: 50px;
            /* Limite la largeur de l'image */
            height: 50px;
            /* Limite la hauteur de l'image */
            object-fit: cover;
            /* Assure que l'image est bien cadrée */
            border-radius: 5px;
            /* Ajoute un léger arrondi aux coins de l'image */
        }

        button {
            padding: 6px 12px;
            border: none;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
            font-size: 14px;
            margin: 2px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-container {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            width: 30%;
            margin-right: 10px;
            font-size: 14px;
        }

        .form-container button {
            background-color: #28a745;
        }

        .form-container a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Liste des Articles</h2>
        <?php
        if (session()->getFlashdata('status')) {
            echo session()->getFlashdata('status');
        }
        ?>
        <div class="form-container">
            <a href="ajouterarticle">
                <button type="submit">Ajouter des articles</button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Image</th> <!-- Nouvelle colonne pour l'image -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($article as $row):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['prix'] ?>€</td>
                        <td><?= $row['stock'] ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <!-- Afficher l'image si elle existe -->
                                <img src="<?= base_url('uploads/' . $row['image']) ?>" alt="Image de l'article" width="100">
                            <?php else: ?>
                                Pas d'image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/editer/' . $row['id']) ?>">
                                <button>Modifier</button>
                            </a>
                            <a href="<?= base_url('admin/supprimer/' . $row['id']) ?>">
                                <button>Supprimer</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>