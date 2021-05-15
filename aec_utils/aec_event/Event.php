<?php

namespace aeCorp\aec_utils\aec_event;


class Event implements EventInterface
{

    protected string $name = __CLASS__;

    protected  $target = null;

    protected array $params = [];

   // private bool $propagationStopped = false;

     /**
     * Get the value of name
     */ 
    public function getName() : string
    {

        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name) : void
    {

        $this->name = $name;
    }

    /**
     * Get the value of target
     */ 
    public function getTarget()
    {

        return $this->target;
    }

    /**
     * Set the value of target
     *
     * @return  self
     */ 
    public function setTarget($target) : void
    {
        $this->target = $target;
    }

    /**
     * Get the value of params
     */ 
    public function getParams() : array
    {

        return $this->params;

    }

    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams(array $params = []) : void
    {
        $this->params = $params;
    }

     /**
     * Get the value of param
     */
    public function getParam(string $name){

        return $this->params[$name] ?? null;

    }

      /**
     * @param bool $flag
     */ 
   /* public function propagationStopped(bool $flag = false) : void{
        $this->propagationStopped = $flag;
    }*/

    /**
     * @return bool 
     */ 
    /*public function isPropagationStopped() : bool{
        return $this->propagationStopped;
    }*/

}