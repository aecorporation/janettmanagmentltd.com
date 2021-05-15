<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class AdminModel extends ModelAbstract
{

    private $user;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
       // $this->histoModel = $container->get(Historik_userModel::class);
    }


    public function login(string $loginUser, string $mdpUser)
    {
        return null;
    }
    
    public function user()
    {
        return null;
    }

}