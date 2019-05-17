<?php


namespace App\Http\Controllers;

use App\Developpeur;
use App\Langage;

class DeveloppeurController
{
    // page pour lister les développeurs d'une équipe
    public function index(){
        $id_equipe = isset($_GET['id']) ? $_GET['id'] : null;
        $nom_equipe = isset($_GET['nom']) ? $_GET['nom'] : null;
        // on récupère l'id de l'équipe dans l'url
        if (!empty($id_equipe) && !empty($nom_equipe)){
            $developpeur = new Developpeur();
            $developpeurs = $developpeur->findDeveloppeurEquipe($id_equipe);

            require 'resources/views/developpeur/index.php';
        }
    }

    // page pour afficher le profil d'un développeur
    public function profil(){
        $id_developpeur = isset($_GET['id']) ? $_GET['id'] : null;
        $nom_developpeur = isset($_GET['nom']) ? ucfirst($_GET['nom']) : null;
        if (!empty($id_developpeur)){
            $developpeur = new Developpeur();
            $developpeur = $developpeur->findOneDeveloppeur($id_developpeur);

            require 'resources/views/developpeur/profil.php';
        }
    }

    //page pour ajouter un nouveau développeur
    public function add(){
        $langage = new Langage();
        $langages = $langage->findAllLangage();
        require 'resources/views/developpeur/add.php';
    }
}