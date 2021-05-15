<?php

namespace aeCorp\aec_utils\aec_event;

use aeCorp\aec_utils\aec_event\ListenerInterface;

class Listener implements ListenerInterface
{

    private $callable = null;
    
    private ?int $priority = null;
    
    /**
     * Permet de faire un appel unique du listener
     */
    private bool $once= false;
    /**
     * Permet de savoir combien de fois le listener a ete appelé
     */
    private int $calls = 0;
    /**
     * Permet de stopper la poursuite des evenement au niveaux superieur
     */
    private bool $listener = false;

    private $stopProgation = false;

public function __construct(callable $callable, bool $stopProgation = false, ?int $priority=0)
{

    $this->callable = $callable;

    $this->stopProgation = $stopProgation;

    $this->priority = $priority;
}


public function handle(EventInterface $event)
{

    if($this->once && $this->calls > 0)

        return null;
    
    $this->calls ++;

    return call_user_func_array($this->callable, [$event]);
}

public function once() : ListenerInterface {

    $this->once = true;

    return $this;
}

public function stopPropagation() : ListenerInterface {

    $this->stopProgation = true;

    return $this;
}

public function isPropagationStopped() : bool {

    return $this->stopProgation;

}

    /**
     * Get the value of event
     */ 
    public function getEvent() : EventInterface
    {
        return $this->event;
    }

    /**
     * Set the value of event
     *
     * @return  self
     */ 
    public function setEvent(EventInterface $event) : ListenerInterface
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get the value of callable
     */ 
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * Set the value of callable
     *
     * @return  self
     */ 
    public function setCallable(callable $callable) : ListenerInterface
    {
        $this->callable = $callable;

        return $this;
    }

     /**
     * Get the value of priority
     */ 
    public function getPriority() : int
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */ 
    public function setPriority(int $priority) : ListenerInterface
    {
        $this->priority = $priority;

        return $this;
    }

}
