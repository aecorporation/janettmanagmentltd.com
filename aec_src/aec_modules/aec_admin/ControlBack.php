<?php

namespace aeCorp\aec_src\aec_modules\aec_admin;

use aeCorp\aec_core\ControlAbstract;
use aeCorp\aec_utils\aec_factory\ContainerInterface;


abstract class ControlBack extends  ControlAbstract 
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->renderer->setFolder("views")
        ->setLayout("admin.layout.main")
        ;
    }




}