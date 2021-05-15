<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_router\Route;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;


class DispatcherMiddleware implements MiddlewareInterface
{

    private $container=null;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * Execute les controllers relatifs aux requetes du client
     */
    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        if($request->getParam(Route::class)===null){
           return $middleware->process($request, $middleware);
        }
        $callable = $request->getParam(Route::class)->getCallable();
        if (is_string($callable)) {
            $callable = $this->container->get($callable);
        }
            call_user_func_array($callable , [$request]);
            
    }
}
