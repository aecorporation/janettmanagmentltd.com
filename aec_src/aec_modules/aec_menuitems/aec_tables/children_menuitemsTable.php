<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Children_menuitems;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class Children_menuitemsTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Children_menuitems::class;
    }
}
