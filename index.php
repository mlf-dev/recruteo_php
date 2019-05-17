<?php

// Chargement du fichier autoloader généré par Composer
require 'vendor/autoload.php';

$uri = $_GET['uri'];
// echo $uri;


// en fonction de l'uri, on change les affichages en appelant les méthodes équivalantes des bons controllers :
if ($uri == 'main/index'){
    $controller = new \App\Http\Controllers\MainController();
    $controller->index();
} else if ($uri == 'main/contact'){
    $controller = new \App\Http\Controllers\MainController();
    $controller->contact();
} else if ($uri == 'developpeur/index'){
    $controller = new \App\Http\Controllers\DeveloppeurController();
    $controller->index();
} else if ($uri == 'developpeur/profil'){
    $controller = new \App\Http\Controllers\DeveloppeurController();
    $controller->profil();
}