<?php


namespace App\Http\Controllers;

// import de la class Equipe
use App\Equipe;

class MainController
{
    // Affichage de la page d'accueil
    public function index(){
        $equipe = new Equipe();
        // on récupère toutes les équipes grâce à la méthode findAllEquipe de la class Equipe
        $equipes = $equipe->findAllEquipe();

        // echo "La méthode index affiche la view de la page d'accueil";
        require 'resources/views/main/index.php';

    }

    public function contact(){
        // echo "La méthode contact affiche la view de la page contact";
        require 'resources/views/main/contact.php';
    }
}