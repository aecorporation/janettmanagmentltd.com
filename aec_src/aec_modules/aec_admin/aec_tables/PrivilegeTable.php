<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_entities\Exemple;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class PrivilegeTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Exemple::class;
    }
}
