<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_src\aec_modules\aec_historique\aec_tables\HistoriqueTable;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\UseradminModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class HistoriqueModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(HistoriqueTable::class);

    }

 
    public function save(Historique $historique){

        $result = $this->table->insert($historique->arrayData());

        if(!$result instanceof PDOStatement){
           throw new OperationFailException("Insertion échouée");
        }

    }


    public function listOfHistoriques(){

        return $this->table->findAll() ?? [];

    }

    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll();

        $lists = $res->getHydrated() ?? [];


        if(count($lists)>0){

            foreach($lists as $item){
                $user = $this->container->get(UseradminModel::class)->findWithoutHistories(["where"=>["code_useradmin = '".$item->getAuteur_historique()."'"]]);
                $item->setUser_historique($user);
            }

        }
        
        return  $lists;

    }

    public function findAllObject(?array $data = []){

        $res = !empty($data) ? $this->table->findAllObject($data) : $this->table->findAllObject();

        return  $res;

    }

    public function find(array $params){

        $res = $this->table->find(["where"=>["id = '".$params["id"]."'"]]);

        $item = $res->getHydrated()[0] ?? null;

        if(isset($item)){
            $item->setUser(
                $this->container->get(UseradminModel::class)->findWithoutHistories(["where"=>["code = '".$item->getAuteur()."'"]])
            );
        }

        return $item;
    }

    public function deleteHistorique(Historique $Historique){

        $result = $this->table->delete([
            "id='".$Historique->getId()."'", "id='".$Historique->getId()."'"
        ]);

        if($result > 0){
            return true;
        }else{
            return true;
        }


    }





}
