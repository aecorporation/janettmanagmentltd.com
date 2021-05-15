<?php

namespace aeCorp\src\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_entities\Exemple;
use aeCorp\aec_utils\aec_factory\Container;

class ExempleTable  extends TableAbstract
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->entity = Exemple::class;
    }
}
