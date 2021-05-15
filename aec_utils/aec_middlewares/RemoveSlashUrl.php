<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_request\RequestInterface;

class RemoveSlashUrl implements MiddlewareInterface
{
    public function process(RequestInterface $request,  MiddlewareInterface $middleware) {
        
        $uri = $request->getUri();
        if(!empty($uri) && $uri[-1]==="/" && mb_strlen($uri)>1) {
            return Response::redirect(substr($uri, 0, -1));
        }
       
        return $middleware->process($request, $middleware);
    }



}
