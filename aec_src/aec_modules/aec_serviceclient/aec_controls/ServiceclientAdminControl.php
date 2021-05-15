<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls;

use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models\ServiceclientModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class ServiceclientAdminControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model=$this->container->get(ServiceclientModel::class);
        $this->titles = [
            "contact"=>"<i class='fa fa-phone'></i> Notre contact",
            "faq"=>"<i class='fa fa-file'></i> Foire aux questions",
            "cmd_livraison"=>"<i class='fa fa-car'></i> Commande et livraison",
            "condition_retour_remboursement"=>"<i class='fa fa-arrow-left'></i> Condition de retour et de remboursement"
        ];
    }

    
    public function executeGestion(RequestInterface $request)
    {

        $menu = $request->getParam("page") ?? "contact";
        $page = !is_null($request->getParam("page")) ? "formgenral" : "contact";

        $obj = $this->model->findAll(["where"=>["menu_serviceclient='$menu'"]]);

        if(count($obj) > 0){
            $module = json_decode($obj[0]->getDonnees_serviceclient());

            
        }

        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION SERVICE INFO CLIENT",
            "views"=>$this->renderer->render("serviceclient.admin.gestion",[
                "title_1"=>$this->titles[$menu],
                "element"=>$this->renderer->render("serviceclient.admin.".$page, [
                    "menu"=>$menu,
                    "module"=>$module ?? null
                ])
            ])
        ], true));
    }

}
