<?php


namespace App\Http\Controllers;


class MainController
{
    // Affichage de la page d'accueil
    public function index(){
        // echo "La méthode index affiche la view de la page d'accueil";
        require 'resources/views/main/index.php';
    }

    public function contact(){
        // echo "La méthode contact affiche la view de la page contact";
        require 'resources/views/main/contact.php';
    }
}