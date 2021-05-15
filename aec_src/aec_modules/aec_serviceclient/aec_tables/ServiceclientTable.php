<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_entities\Serviceclient;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class ServiceclientTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Serviceclient::class;
    }
}
