<?php

namespace aeCorp\aec_utils\aec_renderer;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_renderer\Renderer;

class RendererFactory
{
    public function __invoke(ContainerInterface $container)
    {
      return  Create::factory(Renderer::class, [$container->get("folder")]);
        
    }
}