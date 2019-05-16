<?php


namespace App;


class Equipe
{
    private $id;
    private $nom;
    private $created_at;
    private $id_societe;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Equipe
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
     * @return Equipe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     * @return Equipe
     */
    public function setCreatedAt( \DateTime $created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSociete()
    {
        return $this->id_societe;
    }

    /**
     * @param mixed $id_societe
     * @return Equipe
     */
    public function setIdSociete($id_societe)
    {
        $this->id_societe = $id_societe;
        return $this;
    }


}