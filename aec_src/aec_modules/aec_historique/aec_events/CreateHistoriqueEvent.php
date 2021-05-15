<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_events;

use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_utils\aec_event\Event;

class CreateHistoriqueEvent  extends Event{
    

    public function __construct(Historique $historique)
    {
        $this->setName(__CLASS__);

        $this->target = $historique;
    }

}