<?php

namespace aeCorp\aec_src\aec_modules\aec_emailsender\aec_subscribers;

use aeCorp\aec_src\aec_modules\aec_emailsender\Email;
use aeCorp\aec_utils\aec_event\EventInterface;
use aeCorp\aec_utils\aec_event\EventSubscriberInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;

class EmailEventSubscriber  implements EventSubscriberInterface{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getEvents() : array {

        return [
            MessageSendReceiveEvent::class=>["send"]
        ];

    }

    public function send(EventInterface $event){

        $email = Create::factory(Email::class);

        $email->message($event->getTarget()->sms["message"]);

        $email->sendHTML();

    }


}