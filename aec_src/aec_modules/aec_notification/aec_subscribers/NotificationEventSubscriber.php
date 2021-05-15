<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_subscribers;

 use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_events\MessageSendReceiveEvent;
use aeCorp\aec_src\aec_modules\aec_notification\aec_entities\Notification;
use aeCorp\aec_src\aec_modules\aec_notification\aec_services\NotificationService;
use aeCorp\aec_utils\aec_event\EventInterface;
use aeCorp\aec_utils\aec_event\EventSubscriberInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;

class NotificationEventSubscriber  implements EventSubscriberInterface{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->service = $this->container->get(NotificationService::class);

    }

    public function getEvents() : array {

        return [
            MessageSendReceiveEvent::class=>["createNotification"]
        ];

    }

    public function createNotification(EventInterface $event){

        $notification = Create::factory(Notification::class, [$event->getTarget()->notify]);

        try{

            $this->service->save($notification);

        }catch(OperationFailException $e){

            echo $e->getMessage();

        }

    }


}