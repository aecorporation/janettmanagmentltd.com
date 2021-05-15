<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class AdminControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
       
    }

    public function executeIndex(RequestInterface $request)
    {

       return Response::send(200, $this->renderer->render("admin.index",[
           "titleOfcomponent"=> "BIENVENUE ...",
            "views"=>$this->renderer->render("admin.dashbord")
        ], true));
    }

}
