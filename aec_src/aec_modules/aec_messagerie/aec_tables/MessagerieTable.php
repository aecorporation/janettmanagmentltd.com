<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_entities\Messagerie;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class MessagerieTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Messagerie::class;
    }
}
