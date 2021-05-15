<?php

namespace aeCorp\aec_binarydata;

use aeCorp\aec_core\InterfaceData;

class PdoData implements InterfaceData
{
    private  $host;
    private  $user ;  
    private  $mdp;
    private  $db;
    private  $pdo ;


    public function __construct(array $params)
    {
        $this->host = $params["host"];
        $this->user = $params["user"];
        $this->mdp = $params["mdp"];
        $this->db = $params["db"];
    }
    /**
     * fonction heritee de la class connexion pour la gestion des liens de donnees
     */
    public  function connect()
    {
        if (is_null($this->pdo)) {
            try {
                $this->pdo = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->mdp);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                } catch (\pdoException $e) {
                    exit("Pas de connexion a la base de donnees");
                }
        }
        return $this->pdo;
    }


}