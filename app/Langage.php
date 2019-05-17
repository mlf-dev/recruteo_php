<?php


namespace App;


use App\Kernel\DB;

class Langage
{
    private $nom;

    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Langage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }


}