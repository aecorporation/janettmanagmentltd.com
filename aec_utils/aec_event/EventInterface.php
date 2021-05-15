<?php

namespace aeCorp\aec_utils\aec_event;

interface EventInterface
{
    /**
     * Get the value of name
     */ 
    public function getName() : string;

    /**
     * Set the value of name
     *
     * @return  void
     */ 
    public function setName(string $name) : void;

    /**
     * Get the value of target
     */ 
    public function getTarget();

    /**
     * Set the value of target
     *
     * @return  void
     */ 
    public function setTarget($target);

    /**
     * Get the value of params
     */ 
    public function getParams() : array;

    /**
     * Set the value of params
     *
     * @return  void
     */ 
    public function setParams(array $params = []) : void;

    /**
     * Get the value of param
     */ 
    public function getParam(string $name);

    /**
     * @param bool $flag
     */ 
   // public function propagationStopped(bool $flag) : void;

    /**
     * @return bool 
     */ 
   // public function isPropagationStopped() : bool;

}