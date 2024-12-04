<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon adresse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .text-danger {
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Modifier mon adresse et mon numéro de téléphone</h2>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?= form_open('/client/updateAddress') ?>

        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="form-control"
                value="<?= old('adresse', $adresse['adresse'] ?? '') ?>" required>
            <div class="text-danger"><?= isset($errors['adresse']) ? $errors['adresse'] : '' ?></div>
        </div>

        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" class="form-control"
                value="<?= old('ville', $adresse['ville'] ?? '') ?>" required>
            <div class="text-danger"><?= isset($errors['ville']) ? $errors['ville'] : '' ?></div>
        </div>

        <div class="form-group">
            <label for="code_postal">Code Postal :</label>
            <input type="text" name="code_postal" id="code_postal" class="form-control"
                value="<?= old('code_postal', $adresse['code_postal'] ?? '') ?>" required>
            <div class="text-danger"><?= isset($errors['code_postal']) ? $errors['code_postal'] : '' ?></div>
        </div>

        <div class="form-group">
            <label for="numero_telephone">Numéro de téléphone :</label>
            <input type="text" name="numero_telephone" id="numero_telephone" class="form-control"
                value="<?= old('numero_telephone', $adresse['numero_telephone'] ?? '') ?>" required>
            <div class="text-danger"><?= isset($errors['numero_telephone']) ? $errors['numero_telephone'] : '' ?></div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>

        <?= form_close() ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>