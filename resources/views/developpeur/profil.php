<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
<?php require 'resources/views/layouts/menu.php' ?>
    <h1><?= ucfirst($developpeur->getNom()) ?></h1>
    <p><?= ucfirst($developpeur->getBio()) ?></p>
    <h2>Langages :</h2>
    <ul>
        <?php foreach($developpeur->getLangages() as $langage) :?>
        <li><?= $langage->getNom() ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>