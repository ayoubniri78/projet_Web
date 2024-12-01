<!-- app/Views/admin/reservation/addreservation.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une réservation</title>
</head>
<body>
    <h1>Ajouter une réservation</h1>
    <form action="/admin/reservation" method="POST">
        <label for="table_id">Table:</label>
        <select name="table_id" id="table_id">
            <?php foreach ($tables as $table): ?>
                <option value="<?= $table['id'] ?>"><?= $table['name'] ?> (<?= $table['seats'] ?> sièges)</option>
            <?php endforeach; ?>
        </select><br>

        <label for="start_time">Début:</label>
        <input type="datetime-local" name="start_time" id="start_time" required><br>

        <label for="end_time">Fin:</label>
        <input type="datetime-local" name="end_time" id="end_time" required><br>

        <label for="status">Statut:</label>
        <select name="status" id="status">
            <option value="confirmée">Confirmée</option>
            <option value="annulée">Annulée</option>
        </select><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
