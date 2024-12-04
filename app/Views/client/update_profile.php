<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn {
            width: 100%;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Modifier mon Profil</h1>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('/client/updateProfile') ?>">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            value="<?= old('first_name', $user->first_name) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Nom</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                            value="<?= old('last_name', $user->last_name) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?= old('email', $user->email) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control"
                            value="<?= old('adresse', $adresse ? $adresse['adresse'] : '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control"
                            value="<?= old('ville', $adresse ? $adresse['ville'] : '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="code_postal">Code Postal</label>
                        <input type="text" id="code_postal" name="code_postal" class="form-control"
                            value="<?= old('code_postal', $adresse ? $adresse['code_postal'] : '') ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>