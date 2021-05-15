<?php

namespace aeCorp\aec_src\aec_specs\aec_renderer\aec_extensions;

use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_middlewares\CsrfMiddleware;
use aeCorp\aec_utils\aec_session\Session;

class CsrfExtension
{
    private $session;

    public function __construct()
    {
       $this->session = Create::factory(Session::class);
    }

    public function __invoke()
    {
        return Create::factory(CsrfMiddleware::class, [$this->session]);
    }
}
