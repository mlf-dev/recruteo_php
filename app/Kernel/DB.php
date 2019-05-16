<?php


namespace App\Kernel;


class DB
{
    private $pdo;

    public function __construct()
    {
        try{
            $dsn = "mysql:host=localhost;dbname=td_php_db"; // définition de la base de données sur laquelle on travaille et son emplacement
            $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

            $this->pdo = new \PDO($dsn, "root", "root", $options);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Problème de connexion à la DB".$e->getMessage(); // affichage de l'exception avec getMessage()
        }

    }

    // récupérer la connexion la base de donnée
    public function getPdo() {
    return $this->pdo;
    }
}