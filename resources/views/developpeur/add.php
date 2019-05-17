<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout développeur</title>
</head>
<body>
    <?php require 'resources/views/layouts/menu.php' ?>
    <h1>Ajouter un nouveau développeur </h1>
    <form action="" method="POST">
        <div>
            <label for="nom">Nom</label> <br/>
            <input id="nom" type="text" name="nom">
        </div>
        <div>
            <label for="bio">Bio</label> <br/>
            <textarea id="bio" cols="30" rows="10" name="bio"></textarea>
        </div>
        <div>
            <label>
                <input type="checkbox" name="languages[]" value="php">Php
            </label> <br/>
            <label>
                <input type="checkbox" name="languages[]" value="javascript">Javascript
            </label> <br/>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>