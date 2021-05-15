<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls;

use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models\ServiceclientModel;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_services\ServiceclientService;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ControlFront;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class ServiceclientControl extends ControlFront{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model=$this->container->get(ServiceclientModel::class);
        $this->service = $this->container->get(ServiceclientService::class);
        $this->modelImgVdPub = $container->get(ImagevideopubModel::class);
        $this->footer_menu_index=0;
    }

    
    public function executeContact(RequestInterface $request){

        $menu = "contact";
        $obj = $this->model->findAll(["where"=>["menu_serviceclient='$menu'"]]);
        $images = $this->modelImgVdPub->findAll(["where"=>["menu_imagevideopub='$menu'"]]);

        return Response::send(200, $this->renderer->render("serviceclient.front.index", [
            "obj"=>$obj,
            "menu"=>$this->renderer->render("widget.menu", [
                "footer_menu_index"=>$this->footer_menu_index,
                "index"=>0
            ]),
            "image_title"=>$this->renderer->render("widget.image_title", [
                "images"=>$images,
                "title_"=>"CONTACTEZ-NOUS"
            ]),
            "show"=>true
        ], true));
    }

    public function executeFaq(RequestInterface $request){
        $menu = "faq";
        $obj = $this->model->findAll(["where"=>["menu_serviceclient='$menu'"]]);
        $images = $this->modelImgVdPub->findAll(["where"=>["menu_imagevideopub='$menu'"]]);

        return Response::send(200, $this->renderer->render("serviceclient.front.faq", [
            "obj"=>$obj,
            "menu"=>$this->renderer->render("widget.menu", [
                "footer_menu_index"=>$this->footer_menu_index,
                "index"=>0
            ]),
            "image_title"=>$this->renderer->render("widget.image_title", [
                "images"=>$images,
                "title_"=>"FOIRE AUX QUESTIONS"
            ])
        ], true));
    }

    public function executeCmd_livraison(RequestInterface $request){
        $menu = "cmd_livraison";
        $obj = $this->model->findAll(["where"=>["menu_serviceclient='$menu'"]]);
        $images = $this->modelImgVdPub->findAll(["where"=>["menu_imagevideopub='$menu'"]]);

        return Response::send(200, $this->renderer->render("serviceclient.front.cmd_livraison", [
            "obj"=>$obj,
            "menu"=>$this->renderer->render("widget.menu", [
                "footer_menu_index"=>$this->footer_menu_index,
                "index"=>0
            ]),
            "image_title"=>$this->renderer->render("widget.image_title", [
                "images"=>$images,
                "title_"=>"COMMANDE & LIVRAISON"
            ])
        ], true));
    }

    public function executeCondition_retour_remboursement(RequestInterface $request){
        $menu = "condition_retour_remboursement";
        $obj = $this->model->findAll(["where"=>["menu_serviceclient='$menu'"]]);
        $images = $this->modelImgVdPub->findAll(["where"=>["menu_imagevideopub='$menu'"]]);

        return Response::send(200, $this->renderer->render("serviceclient.front.condition_retour_remboursement", [
            "obj"=>$obj,
            "menu"=>$this->renderer->render("widget.menu", [
                "footer_menu_index"=>$this->footer_menu_index,
                "index"=>0
            ]),
            "image_title"=>$this->renderer->render("widget.image_title", [
                "images"=>$images,
                "title_"=>"CONDITION DE RETOUR & REMBOURSEMENT"
            ])
        ], true));
    }

}
