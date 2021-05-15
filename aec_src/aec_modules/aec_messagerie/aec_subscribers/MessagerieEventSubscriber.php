<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_subscribers;

use aeCorp\aec_src\aec_modules\aec_commandes\aec_events\NewCommandeCreatedEvent;
use aeCorp\aec_utils\aec_event\EventInterface;
use aeCorp\aec_utils\aec_event\EventSubscriberInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class MessagerieEventSubscriber  implements EventSubscriberInterface{

    public function __construct(ContainerInterface $container)
    {
       // $this->container = $container;
    }

    public function getEvents() : array {

        return [
            NewCommandeCreatedEvent::class=>["deleteCookie"]
        ];

    }

    public function deleteCookie(EventInterface $event){

    }


}