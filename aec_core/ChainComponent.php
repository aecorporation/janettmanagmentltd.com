<?php

namespace aeCorp\aec_Core;

use aeCorp\aec_utils\aec_chainactions\ActionsInChain;
use aeCorp\aec_utils\aec_chainactions\InterfaceActionsInChain;
use aeCorp\aec_utils\aec_event\EventManager;
use aeCorp\aec_utils\aec_event\EventManagerInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_session\SessionInterface;

abstract class ChainComponent extends ActionsInChain
{
    protected $container;
    protected InterfaceActionsInChain $nextAction;
    protected $session;
    protected EventManagerInterface $eventManager;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->session = $container->get(SessionInterface::class);
        $this->eventManager  = $container->get(EventManager::class);
    }

}
