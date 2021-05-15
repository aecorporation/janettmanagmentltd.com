<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Menuitems;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class MenuitemsTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Menuitems::class;
    }
}
