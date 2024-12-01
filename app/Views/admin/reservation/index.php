<!-- app/Views/admin/reservation/index.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réservations - Admin</title>
</head>

<body>
    <h1>Liste des Réservations</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Client</th>
                <th>Table</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation['client_id'] ?></td>
                    <td><?= $reservation['table_id'] ?></td>
                    <td><?= $reservation['start_time'] ?></td>
                    <td><?= $reservation['end_time'] ?></td>
                    <td><?= $reservation['status'] ?></td>
                    <td>
                        <a href="/admin/reservation/cancel/<?= $reservation['id'] ?>">Annuler</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>