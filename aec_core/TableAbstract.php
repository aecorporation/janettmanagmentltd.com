<?php

namespace aeCorp\aec_core;

use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_binarydata\PdoData;
use aeCorp\aec_utils\aec_datamanagers\QueryBuilder;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

abstract class TableAbstract {

    public $table;
    public $entity;
    public $dao;
    public $builder;


    public function __construct(ContainerInterface $container)
    {
        $this->dao = $container->get(PdoData::class)->connect();
        $this->builder = Create::factory(QueryBuilder::class, [$this->dao]);
        $obj = new \ReflectionObject($this);
        $this->table = \str_replace($obj->getNamespaceName()."\\","", get_class($this));
        $this->table =strtolower(\str_replace("Table" . "", "", $this->table));

    }

    public function beginTransaction(){
        return  $this->builder->beginTransac();
    }

    public function commit()
    {
        return $this->builder->commit();
    }
    public function rollBack()
    {
        return  $this->builder->rollBack();
    }

    public function lastIdInsert()
    {
        return  $this->builder->lastIdInsert();
    }

    /**
     * Lister les utilisateurs
     *
     * @return void
     */

     private function factoryCode(?array $params = [], ?string $table = null){

        $query = $this->builder;

        if(!empty($params)){

            if (isset($params["fields"])) {

                foreach ($params["fields"] as $field) {
                    $query->select($field);
                }
            }
        }

        $query->from($table ?? $this->table);

        if(!empty($params)){

            if(isset($data["join"])){
                foreach($data["join"] as $w){
                    $query->join($w["table"], $w["condition"], $w["clause"]);
                }
            }

            if (isset($params["where"])) {
                foreach ($params["where"] as $key) {
                    $query->where($key);
                }
            }

            if(isset($data["limit"])){
                $query->limit($data["limit"][0], $data["limit"][1]);
            }

            if (isset($params["order"])) {
                $query->order($params["order"][0], $params["order"][1] ?? "DESC");
            }

            if (isset($params["group"])) {
                $query->group($params["group"]);
            }
            
            if (isset($params["having"])) {
                foreach ($params["having"] as $key) {
                    $query->having($key);
                }
            }
            
            if(isset($data["limit"])){
                $query->limit($data["limit"][0], $data["limit"][1]);
            }

        }

        return $query;
        
     }

    public function find(?array $params = [], ?string $table = null)
    {
        $result = [];

        $query = $this->factoryCode($params, $table);

        if($table ===null){
            $result = $query->into($this->entity)->fetchAll();

        }else{
            $result = $query->fetch();
        }
        
        $query->reset();

        return $result;
    }
    public function findAll(?array $params = [], ?string $table = null)
    {
        $result = [];

        $query = $this->factoryCode($params, $table);

        if($table ===null){
            $result = $query->into($this->entity)->fetchAll();

        }else{
            $result = $query->fetchAll();

        }
        $query->reset();
        
        return $result;
    }



    public function findAllObjects( ?array $params = [], $table = null)
    {
        $result = [];

        $query = $this->factoryCode($params, $table);


        if($table ===null){
            $result = $query->into($this->entity)->objectAll();

        }else{
            $result = $query->objectAll();

        }
        $query->reset();
        return $result;
    }



    public function findObject( ?array $params = [], $table = null)
    {
        $result = [];

        $query = $this->factoryCode($params, $table);

        if($table ===null){
            $result = $query->into($this->entity)->object();

        }else{
            $result = $query->object();

        }
        
        $query->reset();

        return $result;
    }

    public function insert(array $params = [], ?string $table = null)
    {
        return $this->builder->insert($table ?? $this->table, $params);
    }

    public function update(?array $params = [], ?string $table = null)
    {
        $query = $this->builder->update($table ?? $this->table)
        ->set($params["data"]);
        
        if(isset($params["where"])){
            foreach ($params["where"] as $key) {
                $query->where($key);
            }

        }
        $result = $query->params($params["data"])->exec();

        $query->reset();

        return $result;
    }

    public function delete( ?array $criteres = [], ?string $table = null)
    {
        $query = $this->builder->delete($table ?? $this->table);

        if (!empty($criteres)) {
            foreach ($criteres as $key) {
                $query->where($key);
            }
        }
        $result = $query->exec();
        $query->reset();
        return $result;
    }

    public function count(array $criteres = [], ?string $table = null)
    {
        $query =  $this->builder->from($table ?? $this->table);
        
        if (!empty($criteres)) {
            foreach ($criteres as $key) {
                $query->where($key);
            }
        }
        $result = $query->count();
        $query->reset();
        return $result;
    }

}