<?php

namespace aeCorp\aec_src\aec_modules\aec_accueil\aec_controls;

use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class AccueilAdminControl extends ControlBack{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);
    }

    public function executeSlide(RequestInterface $request)
    {
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> $this->message->admin->body->site->slide_show->title,
            "views"=>$this->renderer->render("accueil.admin.slide.".$request->getParam("action"))
        ], true));
    }

}