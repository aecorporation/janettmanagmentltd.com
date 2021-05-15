<?php

namespace aeCorp\aec_src\aec_modules\aec_loginadmin;


use aeCorp\aec_core\ControlAbstract;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

abstract class ControlLoginAdmin  extends ControlAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->renderer->setFolder("views")
        ->setLayout("loginadmin.layout.loginadmin");
    }


}