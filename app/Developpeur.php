<?php


namespace App;


use App\Kernel\DB;

class Developpeur
{
    private $id;
    private $nom;
    private $bio;
    private $created_at;

    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Developpeur
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Developpeur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     * @return Developpeur
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     * @return Developpeur
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    // récupérer dans la DB les développeurs appartenant à une équipe :
    public function findDeveloppeurEquipe($id_equipe){
        // d.* permet de ne sélectionner que les colonnes de la tables développeur, plutôt que * qui sélectionnait toutes les colonnes (même celles de l'équipe, et on observait un conflit pour le nom du développeur qui était confondu avec le nom de l'équipe
        $sql = "SELECT d.* FROM developpeur d LEFT JOIN equipe_developpeur ed on d.id = ed.id_developpeur LEFT JOIN equipe e on e.id = ed.id_equipe WHERE e.id = :id;";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(":id", $id_equipe, \PDO::PARAM_INT);
        // execution de la requête : on récupère la réponse et on la transforme en objet de type Equipe, les objets vont être hydratés par la base de données
        $stmt->execute();
        // Hydratation d'un objet de type Developpeur avec les valeurs de la base de données:
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'App\Developpeur');
        $resultat = $stmt->fetchAll();
        return $resultat;
    }

    public function findOneDeveloppeur($id_developpeur){
        $sql = "SELECT * FROM developpeur d WHERE d.id = :id;";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':id', $id_developpeur, \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Developpeur');
        $resultat = $stmt->fetch();
        return $resultat;
    }

    public function getLangages(){
        $sql = "SELECT * FROM langage l LEFT JOIN langage_developpeur ld on l.id = ld.id_langage WHERE ld.id_developpeur = :id;";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindValue(":id",$this->getId(), \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Langage');
        $resultat = $stmt->fetchAll();
        return $resultat;
    }
}