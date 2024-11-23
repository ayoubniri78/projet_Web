<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            border: none;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-button {
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            padding: 10px 15px;
            color: white;
            background-color: #6c757d;
            border-radius: 4px;
        }

        .back-button a:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Modifier un Article</h2>
        <form action="<?= base_url('admin/update/' . $atricle['id']) ?>" method="POST">
            <label for="articleName">Nom de l'article :</label>
            <input type="text" id="articleName" name="articleName" value="<?= $atricle['nom'] ?>" required>

            <label for="articleDescription">Description :</label>
            <input type="text" id="articleDescription" name="articleDescription" value="<?= $atricle['description'] ?>"
                required>

            <label for="articlePrice">Prix :</label>
            <input type="number" id="articlePrice" name="articlePrice" value="<?= $atricle['prix'] ?>" required>
            <a href="<?= base_url('admin/update/' . $atricle['id']) ?>">
                <button type="submit">Enregistrer les Modifications</button>
            </a>
        </form>
        <div class="back-button">
            <a href="<?= base_url('admin/listeArticle') ?>">Retour à la Liste des Articles</a>
        </div>
    </div>

</body>

</html>