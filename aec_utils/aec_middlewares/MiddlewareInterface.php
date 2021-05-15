<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_request\RequestInterface;

interface MiddlewareInterface{

    public function process(RequestInterface $request, MiddlewareInterface $middleware);

}