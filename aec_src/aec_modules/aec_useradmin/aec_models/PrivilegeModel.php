<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_historique\aec_models\HistoriqueModel;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Privilege;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_tables\PrivilegeTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class PrivilegeModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(PrivilegeTable::class);

    }

    public function savePrivilege(Privilege $privilege){

        $result = $this->table->insert($privilege->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function updatePrivilege(Privilege $privilege){

        $result = $this->table->update([
            "data"=>$privilege->arrayData(),
            "where"=>["code_privilege=:code_privilege"]
        ]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }
    }

    
    /**
     * Return tableau si le resultat est false
     */

    public function findAll(array $params = []){

        $res = [];

        if(!empty($params)){
            $res = $this->table->findAll($params);

        }else{
            $res = $this->table->findAll();

        }

        return  $res->getHydrated();
    }

     /**
     * Return tableau si le resultat est false
     */

    public function find(array $params){

        $object = null;

        $res = $this->table->find($params);

        if(isset($res->getHydrated()[0])){

            $object = $res->getHydrated()[0];

            $object->setHistories($this->container->get(HistoriqueModel::class)->findAllObject(["where"=>["foreignkey_historique='".$object->getcode_privilege()."'"]]));

        }

        return  $object;
    }

    public function deletePrivilege(Privilege $privilege){

        $result = $this->table->delete([
            "code_privilege='".$privilege->getcode_privilege()."'"
        ]);

        if($result > 0){
            return true;
        }else{
            return false;
        }


    }





}
