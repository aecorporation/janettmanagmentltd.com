<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_events;

use aeCorp\aec_src\aec_modules\aec_notification\aec_entities\Notification;
use aeCorp\aec_utils\aec_event\Event;

class CreateNotificationEvent  extends Event{
    

    public function __construct(Notification $notification)
    {
        $this->setName(__CLASS__);

        $this->target = $notification;
    }

}