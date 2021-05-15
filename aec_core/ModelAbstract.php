<?php

namespace aeCorp\aec_core;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_session\Session;

class ModelAbstract extends Dao{

    protected $container;
    protected $table;
    protected $session;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->session = $container->get(Session::class);
    }   
    
}