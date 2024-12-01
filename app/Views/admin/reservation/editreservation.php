<!-- app/Views/admin/reservation/editreservation.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une réservation</title>
</head>

<body>
    <h1>Modifier la réservation</h1>
    <form action="/admin/reservation/update/<?= $reservation['id'] ?>" method="POST">
        <label for="user_id">Utilisateur:</label>
        <select name="user_id" id="user_id">
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>" <?= $user['id'] == $reservation['user_id'] ? 'selected' : '' ?>>
                    <?= $user['username'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="table_id">Table:</label>
        <select name="table_id" id="table_id">
            <?php foreach ($tables as $table): ?>
                <option value="<?= $table['id'] ?>" <?= $table['id'] == $reservation['table_id'] ? 'selected' : '' ?>>
                    <?= $table['name'] ?> (<?= $table['seats'] ?> sièges)</option>
            <?php endforeach; ?>
        </select><br>

        <label for="start_time">Début:</label>
        <input type="datetime-local" name="start_time" id="start_time" value="<?= $reservation['start_time'] ?>"
            required><br>

        <label for="end_time">Fin:</label>
        <input type="datetime-local" name="end_time" id="end_time" value="<?= $reservation['end_time'] ?>" required><br>

        <label for="status">Statut:</label>
        <select name="status" id="status">
            <option value="confirmée" <?= $reservation['status'] == 'confirmée' ? 'selected' : '' ?>>Confirmée</option>
            <option value="annulée" <?= $reservation['status'] == 'annulée' ? 'selected' : '' ?>>Annulée</option>
        </select><br>

        <button type="submit">Mettre à jour</button>
    </form>
</body>

</html>