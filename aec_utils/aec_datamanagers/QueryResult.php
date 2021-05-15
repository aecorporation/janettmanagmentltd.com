<?php

namespace aeCorp\aec_utils\aec_datamanagers;

class QueryResult  implements \ArrayAccess, \Iterator, \Countable
{
    private $records = [];
    private $index = 0;
    private $hydratedRecords = [];
    private $entity;

    public function __construct(array $records, ?string $entity=null)
    {
        $this->records = $records;
        $this->entity = $entity;

        $this->setHydrated($this->records);
      
    }

    public function get(int $index)
    {
        if ($this->entity) {
            
            if (!isset($this->hydratedRecords[$index])) {
                $this->hydratedRecords[$index] =  Hydrator::hydrate($this->records[$index], $this->entity);
            }
            return $this->hydratedRecords[$index];
        }

        return $this->entity;
    }
    public function getArray(){
        return $this->records;
    }
    
    public function setHydrated(array $records)
    {
        $tabs = [];

        if ($this->entity) {

            foreach($records as $key) {

                $tabs[] =  Hydrator::hydrate($key, $this->entity);

            }
        }else{
            $tabs = $records;
        }

        $this->hydratedRecords = $tabs;
        
    }

    public function getHydrated()
    {
        return $this->hydratedRecords;
    }
    
    public function current()
    {
        return $this->get($this->index);
    }
    public function next()
    {
        $this->index++;
    }

    public function count(){
        return count($this->records);
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->records[$this->index]);
    }
    public function rewind()
    {
        $this->index=0;
    }

    public function offsetGet($offset)
    {
        echo $offset;
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return false;
    }

    public function offsetExists($offset)
    {
        return !(is_null($this->get($offset))) ? true : false;
    }

    public function offsetUnset($offset)
    {
        return false;
    }
}