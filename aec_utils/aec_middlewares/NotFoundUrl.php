<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_router\Route;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;

class NotFoundUrl implements MiddlewareInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        if ($request->getParam(Route::class) === null) {
            Response::send(200, "
            <p style='text-align:center;font-size:20px;'>Page Introuvable </br><img src='".$this->container->get("folder.img"). "/error_page.png' style='width: 100px;' /></p>
            
            ");
        }
        
    }

}

