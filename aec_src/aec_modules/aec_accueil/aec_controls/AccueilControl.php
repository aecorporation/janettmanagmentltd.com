<?php

namespace aeCorp\aec_src\aec_modules\aec_accueil\aec_controls;

use aeCorp\aec_src\aec_modules\aec_blog\aec_models\BlogModel;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_models\menuitemsModel;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models\ServiceclientModel;
use aeCorp\aec_src\aec_modules\ControlFront;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class AccueilControl extends ControlFront{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);
        $this->ImagevideopubModel = $container->get(ImagevideopubModel::class);
        $this->blogModel = $container->get(BlogModel::class);
        $this->serviceClientModel = $container->get(ServiceclientModel::class);
        $this->menuitemsModel = $container->get(menuitemsModel::class);
    }

    public function executeIndex(RequestInterface $request){

        return Response::send(200, $this->renderer->render("accueil.front.index", [

                "blogs"=>$this->blogModel->findAll(),
                "serviceclients"=>$this->serviceClientModel->findAll(["menu_serviceclient='contact'"]),
                "menu_menuitems"=>$this->menuitemsModel->findAllObjects(),
        ], true));
    }

}