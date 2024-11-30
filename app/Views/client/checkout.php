<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Paiement</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .confirmation-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .confirmation-card {
            background-color: #fff;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
        }

        .success-message {
            font-size: 2rem;
            color: #28a745;
            margin-bottom: 20px;
        }

        .confirmation-text {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .confirmation-details {
            font-size: 1rem;
            color: #666;
            margin-bottom: 30px;
        }

        .return-home {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .return-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="confirmation-container">
        <div class="confirmation-card">
            <h2 class="success-message">Paiement réussi !</h2>
            <p class="confirmation-text">Merci pour votre achat. Votre paiement a été validé avec succès.</p>
            <div class="icon">
                <i class="fa fa-check-circle"></i>
            </div>
            <p class="confirmation-details">Vous recevrez bientôt un email de confirmation avec les détails de votre
                commande.</p>
            <a href="index.html" class="return-home">Retour à l'accueil</a>
        </div>
    </div>

</body>

</html>