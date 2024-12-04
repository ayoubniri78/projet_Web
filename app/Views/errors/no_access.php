<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès refusé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f8f9fa;
            color: #343a40;
        }

        h1 {
            font-size: 2rem;
            color: #dc3545;
        }

        p {
            font-size: 1.2rem;
        }

        a,
        button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Accès refusé</h1>
    <p>Vous n'avez pas les permissions pour accéder à cette page.</p>
    <button onclick="history.back()">Retour</button>
</body>

</html>