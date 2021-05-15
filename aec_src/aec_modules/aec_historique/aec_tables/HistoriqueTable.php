<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class HistoriqueTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Historique::class;
    }

    public function findAllObject(?array $data= null){

        $res = [];

        if(is_null($data)){

        $res = $this->builder
        ->from("historique")
        ->join("useradmin","auteur_historique = code_useradmin", "LEFT")
        ->order("DESC", "historique.date_at_historique")
        ->objectAll();
        $this->builder->reset();

        }else{

        $res = $this->builder  
        ->from("historique")
        ->join("useradmin","auteur_historique = code_useradmin", "LEFT")
        ->where(join(", ", $data["where"]))
        ->order("DESC", "historique.date_at_historique")
        ->objectAll();
        $this->builder->reset();
        
        }

        return $res;
        
    }
}
