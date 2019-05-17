<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <style>
        table,td,th {
            border : 1px solid #000000;
            border-collapse: collapse;
        }
        th,td {
            padding: 5px;
        }
    </style>
</head>
<body>
<?php require 'resources/views/layouts/menu.php' ?>
    <h1>Bienvenue sur Recruteo</h1>
    <p>Cette application vous permettra de gérer des équipes de développeurs.</p>

    <h2>Liste des équipes :</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($equipes as $equipe) :?>
        <tr>
            <th><?= $equipe->getNom() ?></th>
            <th><?= $equipe->getCreatedAt() ?></th>
            <th>
                <a href="index.php?uri=developpeur/index&id=<?= $equipe->getId() ?>">Voir tous les développeurs</a>
            </th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>