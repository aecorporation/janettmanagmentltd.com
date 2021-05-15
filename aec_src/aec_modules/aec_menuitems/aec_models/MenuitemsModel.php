<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Children_menuitems;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Menuitems;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables\Children_menuitemsTable;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables\MenuitemsTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class menuitemsModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(MenuitemsTable::class);
        $this->tablechildren = $this->container->get(Children_menuitemsTable::class);
    }

    public function savemenuitems(Menuitems $menuitems){

        $result = $this->table->insert($menuitems->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }

    } 

     /** Nombre slug de produit */
     public function countmenuitemss(?array $data){

        return $this->table->count($data);

    }

    public function updatemenuitems(menuitems $menuitems){

        $result = $this->table->update(["data"=>$menuitems->arrayData(), "where"=>["code_menuitems=:code_menuitems"]]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll();

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }

    public function findAllObjects(?array $data = []){

        $lists = !empty($data) ? $this->table->findAllObjects($data) : $this->table->findAllObjects();

        foreach($lists as $item){
            $item->children = $this->findAllChildren(["codemenuitems_children_menuitems='".$item->code_menuitems."'"]);
        }
        
        return  $lists;

    }

    public function delete(?menuitems $menuitems){

        $result = $this->table->delete(["code_menuitems='".$menuitems->getCode_menuitems()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }





    public function savechildrenmenuitems(Children_menuitems $Children_menuitems){

        $result = $this->tablechildren->insert($Children_menuitems->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }

    } 

    public function updatechildrenmenuitems(Children_menuitems $Children_menuitems){

        $result = $this->tablechildren->update(["data"=>$Children_menuitems->arrayData(), "where"=>["code_children_menuitems=:code_children_menuitems"]]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function findAllChildren(?array $data = []){

        $res = !empty($data) ? $this->tablechildren->findAll($data) : $this->tablechildren->findAll();

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }

    public function deletechildren_menuitems(?Children_menuitems $Children_menuitems){

        $result = $this->tablechildren->delete(["code_children_menuitems='".$Children_menuitems->getCode_children_menuitems()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }

    


}
