<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tables</title>
    <link rel="stylesheet" href="<?= base_url('css/tablestyle.css') ?>">
</head>

<body>
    <div class="container">
        <h2>Liste des Tables</h2>
        <a href="<?= base_url('/admin/table/addTable') ?>">
            <button onclick="window.location.href='addtable.html'" class="btn">Ajouter une table</button>
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Nombre de places</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($table as $row):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['seats'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/table/edittable' . $row['id']) ?>">
                                <button>Modifier</button>
                            </a>
                            <a href="<?= base_url('admin/table/supprimer/' . $row['id']) ?>">
                                <button>Supprimer</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('js/tablejs.js') ?>"></script>
</body>

</html>