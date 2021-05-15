<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_router\RouterInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;
use aeCorp\aec_utils\aec_request\Response;

class RouterMiddleware implements MiddlewareInterface
{
    private ?RouterInterface $router = null;
    private ?ContainerInterface $container = null;

    public function __construct(ContainerInterface $container) {

        $this->container = $container;

        $this->router= $container->get(RouterInterface::class);
    }

    /**
     * verifie si la requete renseignée par le client est une route valide
     * 
     *
     * @param RequestInterface $request
     * @param MiddlewareInterface $middleware
     * @return void
     */
    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {

        $route = $this->router->match($request);
       
        if ($route === null) {
           return $middleware->process($request, $middleware);
        }
        $request->setParams($route->getParams())
        ->setParams([get_class($route)=> $route])
        ->setParams(["lang", $this->router->getLang()])
        ;
        return $middleware->process($request, $middleware);
    }
}