<?php

namespace aeCorp\aec_utils\aec_event;

interface ListenerInterface
{

    
public function handle(EventInterface $event);

public function once() : ListenerInterface;

public function getEvent() : EventInterface;

public function setEvent(EventInterface $event) : ListenerInterface;

public function getCallable();

public function setCallable(callable $callable) : ListenerInterface;

public function stopPropagation() : ListenerInterface ;

public function isPropagationStopped() : bool ;

}