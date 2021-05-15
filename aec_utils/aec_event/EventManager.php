<?php

namespace aeCorp\aec_utils\aec_event;


class EventManager implements EventManagerInterface
{

    private static ?EventManagerInterface $instance = null;

    private array $listeners = [];

    private array $subscribers = [];


    public static function getInstance() : EventManagerInterface{

        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Permets d'attacher des evenements afin de les executer
     *
     * @param EventSubscriberInterface $subscriber
     * @return void
     */

    public function addEventSubscriber(EventSubscriberInterface $subscriber) : void
    {
               
            $events = $subscriber->getEvents();

            foreach($events as $event => $arrayEvent) 
            {
                $method = $arrayEvent[0];

                $priority = isset($arrayEvent[1])?$arrayEvent[1]: 0;

                $stopProgation = isset($arrayEvent[2]) ? $arrayEvent[2]: false;

                $unik = isset($arrayEvent[3]) ? $arrayEvent[3] : false;

                $listener = null;

                if(!is_null($unik) && $unik===true){
                    echo 77;
                    $listener = $this->addEventListener($event, [$subscriber, $method], $priority)->once();
                }else{
                    $listener =  $this->addEventListener($event, [$subscriber, $method]);
                }
            
                if (!is_null($stopProgation) && $stopProgation === true) {
                    $listener->stopPropagation();
                }

            }

    }

    public function addEventListener($event, callable $callback, bool $isPropagationintStopped = false, $priority = 0) : ListenerInterface
    {

        if(!$this->hasListener($event)){

            $this->listeners[$event] = [];

        }

        $this->checkDoubleEvent($event, $callback);

        $listener = new Listener($callback,$isPropagationintStopped, $priority);

        $this->listeners[$event][] = $listener;

        $this->sortLister($event);


        /*$this->listeners[$event][] = [
            "callback"=>$callback, 
            "priority"=>$priority
        ];*/

        return $listener;
    }

    public function clearnEventListener($event, callable $callback) : bool{

        $this->listeners[$event] = array_filter($this->listeners[$event], function($listener) use ($callback){
            return $listener["callback"] !== $callback;
        });

        return true;

    }

    public function clearnListeners(string $event) : void{

        $this->listeners[$event] = [];

    }

    /**
     * @param string|EventInterface $event
     * @param Object|string $target
     * @param array|Object $args
     */

    public function emit($event, $target = null, $args = []){

        if(is_string($event)){

           $event = $this->makeEvent($event, $target, $args);

        }

        if(!$this->hasListener($event->getName())){

            return;
            
        }


        if($this->listeners[$event->getName()]){

            $listeners = $this->listeners[$event->getName()];

            foreach($listeners as $listener){

                if ($listener->isPropagationStopped()) {
                    break;
                }

               // call_user_func($callback, $event);

               $listener->handle($event);

            }
        }

    }

    private function makeEvent(string $eventName, $target, array $args) : EventInterface{

        $event = new Event();
        $event->setName($eventName);
        $event->setTarget($target);
        $event->setParams($args);

        return $event;

    }
    
    






    private function checkDoubleEvent(string $event, callable $callable) : bool
    {
        foreach ($this->listeners[$event] as $listener) {
            if($listener->getCallable() === $callable){
                  throw ("L'evenement $event existe déjà");
            }
        }

        return false;
    }


    private function sortLister($event) {

        uasort($this->listeners[$event], function($listenerA, $listenerB){

                return $listenerA->getPriority() < $listenerB->getPriority();

        });
        
    }

    private function hasListener(string $event) : bool{
        return array_key_exists($event, $this->listeners);
    }

    

}