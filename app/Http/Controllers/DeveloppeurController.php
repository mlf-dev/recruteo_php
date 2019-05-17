<?php


namespace App\Http\Controllers;


use App\Developpeur;

class DeveloppeurController
{
    // page pour lister les développeurs d'une équipe
    public function index(){
        $id_equipe = isset($_GET['id']) ? $_GET['id'] : null;
        // on récupère l'id de l'équipe dans l'url
        if (!empty($id_equipe)){
            $developpeur = new Developpeur();
            $developpeurs = $developpeur->findDeveloppeurEquipe($id_equipe);

            require 'resources/views/developpeur/index.php';
        }

    }
}