<?php

namespace aeCorp\aec_src\aec_modules\aec_panier\aec_events;

use aeCorp\aec_utils\aec_event\Event;

class DeleteCookieOfPanierEvent  extends Event{
    

    public function __construct()
    {
        $this->setName(__CLASS__);
    }

}