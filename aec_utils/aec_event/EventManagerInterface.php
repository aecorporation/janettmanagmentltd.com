<?php

namespace aeCorp\aec_utils\aec_event;

use aeCorp\aec_utils\aec_event\ListenerInterface;

interface EventManagerInterface
{
    public function addEventListener($event,callable $callback, bool $isPropagationintStopped = false, int $priority = 0) :ListenerInterface;

    public function clearnEventListener($event, callable $callback) :bool;

    public function clearnListeners(string $event) : void;

    /**
     * @param string|EventInterface $event
     * @param Object|string $target
     * @param array|Object $args
     */

    public function emit($event, $target = null, $args = []);

    public function addEventSubscriber(EventSubscriberInterface $subscriber) : void;

}