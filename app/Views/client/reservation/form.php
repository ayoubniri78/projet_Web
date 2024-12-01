<!-- client/reservation/form.php -->
<h1>Formulaire de Réservation</h1>
<form action="/client/reservation/makeReservation" method="post">
    <label for="client_name">Nom du Client:</label>
    <input type="text" name="client_name" id="client_name" required>

    <label for="client_phone">Numéro de téléphone:</label>
    <input type="text" name="client_phone" id="client_phone" required>

    <label for="table_id">Table:</label>
    <select name="table_id" id="table_id" required>
        <?php foreach ($tables as $table): ?>
            <option value="<?= $table['id'] ?>"><?= $table['name'] ?> (<?= $table['seats'] ?> places)</option>
        <?php endforeach; ?>
    </select>

    <label for="start_time">Heure de début:</label>
    <input type="datetime-local" name="start_time" id="start_time" required>

    <label for="end_time">Heure de fin:</label>
    <input type="datetime-local" name="end_time" id="end_time" required>

    <button type="submit">Réserver</button>
</form>