<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_historique\aec_models\HistoriqueModel;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Useradmin;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_tables\UseradminTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class UseradminModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(UseradminTable::class);

    }

    public function saveUseradmin(Useradmin $Useradmin){

        $result = $this->table->insert($Useradmin->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function updateUseradmin(Useradmin $Useradmin){

        $result = $this->table->update([
            "data"=>$Useradmin->arrayData(),
            "where"=>["code_useradmin=:code_useradmin"]
        ]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function findAllJoin(?array $data = null){

        return isset($data) ? $this->table->findAllJoin($data) : $this->table->findAllJoin();
    }

    public function findAll(?array $criteres = null){

        $objects = [];

        if($criteres !==null){
            $objects = $this->table->findAll(["where"=>$criteres]) ?? [];
        }else{
            $objects = $this->table->findAll() ?? [];
        }
        return $objects;
    }

    public function findWithoutHistories(?array $data = null){

        $object = isset($data) ? $this->table->find($data) : $this->table->find();

        return $object ->getHydrated()[0] ?? null;
    }
    /**
     * Return tableau si le resultat est null
     */

    public function find(?array $params){

        $object = null;

        $res = $this->table->find($params);

        if(isset($res->getHydrated()[0])){

            $object = $res->getHydrated()[0];

            $object->setHistories($this->container->get(HistoriqueModel::class)->findAllObject(["where"=>["foreignkey_historique='".$object->getCode_useradmin()."'"]]));

        }

        return $object;
    }

    public function find_(?array $data){

        $res =  isset($data) ? $this->table->find($data) : $this->table->find();

        return $res ->getHydrated()[0] ?? null;
    }

    /**
     * Return tableau si le resultat est null
     */

    public function findwithprivilege(?array $params){

        $object = null;

        $res = $this->table->find($params);

        if(isset($res->getHydrated()[0])){

            $object = $res->getHydrated()[0];

            $object->setPrivilege_useradmin($this->container->get(PrivilegeModel::class)->find(["where"=>["code_privilege='".$object->getCodePrivilege_useradmin()."'"]]));

        }

        return $object;
    }

    public function findObject(?array $params){

        $object = null;

        $res = $this->table->findObject($params);

        return $object;
    }

    public function deleteUseradmin(Useradmin $useradmin){

        $result = $this->table->delete(["code_useradmin='".$useradmin->getCode_useradmin()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }


    }





}
