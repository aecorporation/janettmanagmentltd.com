<?php

namespace aeCorp\aec_utils\aec_event;

use aeCorp\aec_tils\aec_event\Listener;
use aeCorp\aec_utils\aec_event\EventSubscriberInterface;

class Emitter {

    private static ?Emitter $instance = null;

    private array $listeners = [];

    private array $subscribers = [];

    public static function getInstance() : Emitter{

        if(is_null(self::$instance)){
            self::$instance=new self();
        }
        return self::$instance;
    }
/**
 * Permets d'attacher des evenements afin de les executer
 *
 * @param EventSubscriberInterface $subscriber
 * @return void
 */
    public function subscribe(EventSubscriberInterface $subscriber) : void
    {
        $this->subscribers[] = $subscriber;
    }

    public function discribe(EventSubscriberInterface $subscriber): void
    {
        if($key = array_search($subscriber, $this->subscribers)){
            unset($this->subscribers[$key]);
        }
    }

    public function execute()
    {
        foreach ($this->subscribers as $subscriber) {
            
            $events = $subscriber->listEvents();

            foreach($events as $event => $arrayEvent) 
            {
                $method = $arrayEvent[0];
                $priority = isset($arrayEvent[1])?$arrayEvent[1]:null;
                $propagation = isset($arrayEvent[2]) ? $arrayEvent[2]:null;
                $unik = isset($arrayEvent[3]) ? $arrayEvent[3] : null;

                $ecouteur = null;

                if(!is_null($unik) && $unik===true){
                    $ecouteur = $this->on($event, [$subscriber, $method])->once();
                }else{
                    $ecouteur =  $this->on($event, [$subscriber, $method]);
                }
              
                if (!is_null($propagation) && $propagation === false) {
                    $ecouteur->stopPropagation();
                }

            }
        }

    }

    public function on(string $event, Callable $callable, ?int $priority = 0) : Listener
    {
        if (!$this->hasListener($event)) 
        {
            $this->listeners[$event] = [];    
        }

        $this->checkDoubleEvent($event, $callable);
        $listener= new Listener($callable, $priority);
        $this->listeners[$event][] =  $listener;
        $this->sortLister($event);
        return $listener;
    }

    public function once(string $event, callable $callable, ?int $priority = null){

        return $this->on($event, $callable, $priority)->once();

    }


    public function emit(string $event, ...$args)
    {
      
        if($this->hasListener($event)){

            foreach ($this->listeners[$event] as $listener) {
              
                $listener->handle($args);

                if($listener->getStopProgation()){

                break;

                }
            }
        }
    }

    private function hasListener(string $event) : bool{
        return array_key_exists($event, $this->listeners);
    }

    private function sortLister($event) {
        uasort($this->listeners[$event], function($listenerA, $listenerB){
                return $listenerA->getPriority() < $listenerB->getPriority();
        });
    }

    private function checkDoubleEvent(string $event, callable $callable) : bool
    {
        foreach ($this->listeners[$event] as $listener) {
            if($listener->getCallable()===$callable){
                  throw ("L'evenement existe deja");
            }
        }

        return false;
    }

}