<!-- app/Views/client/reservation/myReservations.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Réservations</title>
</head>

<body>
    <h1>Mes Réservations</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Table</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation['table_id'] ?></td>
                    <td><?= $reservation['start_time'] ?></td>
                    <td><?= $reservation['end_time'] ?></td>
                    <td><?= $reservation['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>