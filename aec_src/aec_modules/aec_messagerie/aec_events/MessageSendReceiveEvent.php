<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_events;

use aeCorp\aec_utils\aec_event\Event;
use stdClass;

class MessageSendReceiveEvent extends Event{
    
    public function __construct(stdClass $object = null)
    {
        $this->setName(__CLASS__);

        $this->target = $object;

    }

}