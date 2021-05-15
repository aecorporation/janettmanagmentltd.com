<?php

namespace aeCorp\aec_utils\aec_renderer;

use aeCorp\aec_utils\aec_factory\ContainerInterface;

abstract class Widget implements WidgetInterface
{
    
    protected ?ContainerInterface $container = null;

    protected ?RendererInterface $renderer = null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->renderer = $container->get(RendererInterface::class);

        $this->renderer->viewPath(dirname(dirname(__DIR__))."/aec_src/aec_modules")->setFolder("views");

    }


}