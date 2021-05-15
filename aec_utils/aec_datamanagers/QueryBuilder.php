<?php

namespace aeCorp\aec_utils\aec_datamanagers;

use PDO;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_datamanagers\QueryResult;

class QueryBuilder 
{

    private $select=[];
    private $from;
    private $delete;
    private $update;
    private $set = [];
    private $join= [];
    private $table;
    private $where=[];
    private $having=[];
    private $group;
    private $order=[];
    private $limit;
    private $params = [];
    private $entity;


    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function reset() : void
    {
        $this->table = "";
        $this->delete = "";
        $this->update = "";
        $this->where = [];
        $this->having = [];
        $this->params = [];
        $this->set = [];
        $this->join = [];
        $this->entity="";
        $this->limit = "";
        $this->group = "";
        $this->order = [];
        $this->from=[];
        $this->select=[];
    }

    public function beginTransac()
    {
        return $this->dao->beginTransaction();
    }
    public function commit()
    {
        return $this->dao->commit();
    }
    public function rollBack()
    {
        return $this->dao->rollback();
    }

    public function lastIdInsert()
    {
        return $this->dao->lastInsertId();
    }

    public function insert(string $table, $data)
    {
        $query ="INSERT INTO ".$table." SET ";
        $parts=[];
        $datas = [];
        if(is_array($data))
        {
            foreach ($data as $key => $value) {

                if(!is_array($value) && !is_object($value)){

                    $parts[] = "$key=:$key";
                    $datas[$key] = $value;

                }
                
            }
        }
        $query = $query . join(",", $parts);
        
        $statement = $this->dao->prepare($query);
 
        $statement->execute($datas);
       
        return $statement;

    }

    public function delete(string $table)
    {
        $this->delete = "DELETE FROM " . $table;
        return $this;
    }

    public function update(string $table)
    {
        $this->update = "UPDATE " . $table;
        return $this;
    }

    public function set(array $data)
    {
        foreach ($data as $key => $value) {
            if (!is_array($value) && !is_object($value)) {
                if(!is_null($value) || $value !==""){
                    $this->set[] = "$key=:$key";
                }
            }
        }
        return $this;
    }

    public function exec()
    {
       
        $where = [];
        if (!empty($this->where)) {
            $where[] = " WHERE ";
            $where[] = "(" . join(" ) AND (", $this->where) . ")";
           
        }
        if($this->update){
            $query =  $this->update . " SET " . join(", ", $this->set) . join(" ", $where);
          
            $statement = $this->dao->prepare($query);
            $statement->execute($this->params);
           
            return $statement;
        }
        if ($this->delete) {
           
            $query =  $this->delete . join(" ", $where);
            $statement = $this->dao->exec($query);
           
            return $statement;
        }
        
    }

    public function select(string ...$fields) : self
    {
        $this->select =array_merge($this->select, $fields);
        return $this;
    }

    public function from(string $table, ?string $allias = null): self
    {
        if ($allias) {
            $this->from[$allias] = $table;
        } else {
            $this->from[] = $table;
        }
        return $this;
    }

    public function join(string $table, string $on, ?string $type=null): self
    {
        $this->join[$type][] = [$table, $on];
        return $this;
    }

    public function where(string ...$conditions) : self
    {
        $this->where = array_merge($this->where, $conditions);
        return $this;
    }

    public function having(string ...$conditions) : self
    {
        $this->having = array_merge($this->having, $conditions);
        return $this;
    }

    public function count() : ?int
    {
        $obj = clone($this);
        return $obj->select("COUNT(*)")->execute()->fetchColumn();

    }

    public function order(string $order, string $direction="DESC") : self
    {
        $this->order [$order] = $direction;
        return $this;
    }

    public function group(string $field)
    {
        $this->group = $field;
        return $this;
    }

    public function limit(int $offset = 0, int $lenght) : self
    {
        $this->limit = "$offset, $lenght";

        return $this;
    }
    public function __toString()
    {
        $parts[] = "SELECT";
        if($this->select){
            $parts []= join(",", $this->select);
        }else{
            $parts[] = "*";
        }
        $parts[] = "FROM";
        $parts[] = $this->builderFrom();

        if(!empty($this->join)){

            foreach ($this->join as $type => $tabs) {
                
                foreach ($tabs as [$table, $on] ) {
                    $parts[] = strtoupper($type)." JOIN $table ON $on";
                }
            }
        }

        if(!empty($this->where)){
            $parts[] ="WHERE";
            $parts[] ="(". join(" ) AND (", $this->where). ")";
        }

        if ($this->group) {
            $parts[] = " GROUP BY ";
            $parts[] = $this->group;
        }

        if(!empty($this->having)){
            $parts[] ="HAVING";
            $parts[] ="(". join(" ) AND (", $this->having). ")";
        }


        if (!empty($this->order)) {
            $parts[] = " ORDER BY ";
            $parts[] = $this->builderOder();
        }

        if ($this->limit) {
            $parts[] = " LIMIT ";
            $parts[] = $this->limit;
        }


        $query = join(" ", $parts);
       // echo $query."-----------";
        return $query;
    }
    
    private function builderFrom() : ?string
    {
        $from = [];

        foreach ($this->from as $key => $value) {
            if(is_string($key)){
                $from [] = "$value as $key";
            }else{
                $from []= $value;
            }
            return join(", ", $from);
        }

    }
    private function builderOder(): ?string
    {
        $order = [];

        foreach ($this->order as $key => $value) {
            if (is_string($key)) {
                $order[] = "$value $key";
            } 
            return join(", ", $order);
        }
    }

    public function params(array $params) : self
    {
       $p = array_filter($params, function($item){
                return !is_array($item) && !is_object($item);
        });
        $this->params= array_merge($this->params, $p);
        return $this;
    }

    private function execute()
    {
        $query = $this->__toString();

        if(!empty($this->params))
        {
            $statement = $this->dao->prepare($query);
            $statement->execute($this->params);
           
            return $statement;
        }
        return $this->dao->query($query);
        
    }

    public function into(string $entity) : self
    {
        $this->entity = $entity;
        return $this; 
    }

    public function fetchAll() 
    {
        return  Create::factory(QueryResult::class, [$this->records = $this->execute()->fetchAll(\PDO::FETCH_ASSOC) , $this->entity]);
    }
    

    public function fetch()
    {
        $records = $this->execute()->fetch(\PDO::FETCH_ASSOC);
        if($records){
            if ($this->entity) {
                return Create::factory($this->entity, [$records]);
            }
            return $records;
        }
        return false;
    }

    public function objectAll()
    {
        return   $this->execute()->fetchAll(\PDO::FETCH_OBJ);
    }

    public function object()
    {
        return   $this->execute()->fetch(\PDO::FETCH_OBJ);
    }






}