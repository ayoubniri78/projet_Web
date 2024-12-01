<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Table</title>
    <link rel="stylesheet" href="<?= base_url('css/tablestyle.css') ?>">
</head>

<body>
    <div class="container">
        <h2>Ajouter une nouvelle table</h2>
        <form action="/admin/addTable" method="POST"> 
            <label for="tableName">Nom de la table:</label>
            <input type="text" id="tableName" name="tableName" required>

            <label for="tableSeats">Nombre de places:</label>
            <input type="number" id="tableSeats" name="tableSeats" required>

            <label for="tableStatus">Status:</label>
            <select id="tableStatus" name="tableStatus" required>
                <option value="disponible">Disponible</option>
                <option value="occupée">Occupée</option>
            </select>

            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>

    <script src="<?= base_url('js/tablejs.js') ?>"></script>
</body>

</html>