<?php

namespace aeCorp\aec_Core;

use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_event\EventManager;
use aeCorp\aec_utils\aec_event\EventManagerInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

abstract class ServiceCrud
{
    protected ?ContainerInterface $container = null;
    protected $session;
    protected ?EventManagerInterface $eventManager = null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->eventManager  = $container->get(EventManager::class);
    }

    use ModuleTrait;

}