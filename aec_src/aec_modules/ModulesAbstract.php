<?php

namespace aeCorp\aec_src\aec_modules;

use aeCorp\aec_utils\aec_event\EventManager;
use aeCorp\aec_utils\aec_event\EventManagerInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_renderer\RendererInterface;
use aeCorp\aec_utils\aec_router\RouterInterface;

/**
 * ModulesAbstract. permettant a tous les modules de finir leur configuration
 * Et d'avoir un container, le centre des configurations
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	.
 * @global
 */
abstract class ModulesAbstract {

   const DEFINITION=[];
   const MIGRATION=[];
   const SEED=[];

   protected ContainerInterface $container;
    protected RouterInterface $router;
    protected RendererInterface $renderer;
    protected EventManagerInterface $eventManager;

     public function __construct(ContainerInterface $container){
        $this->container = $container;
        $this->renderer = $container->get(RendererInterface::class);
        $this->router = $container->get(RouterInterface::class);
        $this->eventManager = $container->get(EventManager::class);
     }

         
     }
