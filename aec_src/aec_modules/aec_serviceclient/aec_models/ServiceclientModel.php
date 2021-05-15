<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_entities\Serviceclient;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_tables\ServiceclientTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class ServiceclientModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(ServiceclientTable::class);
       
    }

    public function count(?array $data){

        return  isset($data) ? $this->table->count($data) : $this->table->count();

    } 
    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll();

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }
    
    public function save(Serviceclient $serviceclient){

        $result = $this->table->insert($serviceclient->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }

    } 

    public function update(Serviceclient $serviceclient){

        $result = $this->table->update(["data"=>$serviceclient->arrayData(), "where"=>["menu_serviceclient=:menu_serviceclient"]]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }


}
