<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
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
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 8px;
            width: 100%;
            margin-bottom: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
        }

        input[type="file"] {
            padding: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            padding: 10px;
            width: 100%;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>

</head>

<body>

    <div class="container">
        <h2>Ajouter un Article</h2>
        <form action="/admin/enregistrerarticle" method="POST">
            <input type="text" name="articleName" placeholder="Nom de l'article" required>
            <input type="text" name="articleDescription" placeholder="Description" required>
            <input type="number" name="articlePrice" placeholder="Prix de l'article" required>
            <input type="file" name="articleImage" required>
            <button type="submit">Ajouter l'Article</button>
        </form>
        <a href="listeArticle"><button>Retour à la Liste des Articles</button></a>
    </div>

</body>

</html>