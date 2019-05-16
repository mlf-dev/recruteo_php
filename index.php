<?php

// Chargement du fichier autoloader généré par Composer
require 'vendor/autoload.php';

$uri = $_GET['uri'];
// echo $uri;

if ($uri == 'main/index'){
    $controller = new \App\Http\Controllers\MainController();
    $controller->index();
} else if ($uri == 'main/contact'){
    $controller = new \App\Http\Controllers\MainController();
    $controller->contact();
}
