<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_models\MenuitemsModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class menuitemsAdminControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model = $container->get(MenuitemsModel::class);

        $this->menus = [
            "mission_vision"=>"Missions et visions",
            "services"=>"Services"
        ];

        $this->types = [
            "service"=>"Service",
            "vision"=>"vision"
        ];
    }

    public function executeGestion(RequestInterface $request)
    {
        
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "SERVICES ET VISIONS",
            "views"=>$this->renderer->render("menuitems.admin.gestion",[
                "title_1"=>"<i class='fa fa-list'></i> Liste des services et visions",
                "element"=>$this->renderer->render("menuitems.admin.list",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "table"=>$this->renderer->render("menuitems.admin.table",[
                        "menuitems"=>$this->model->findAll()
                    ])
                ])
            ])
        ], true));
    }

    public function executeSave(RequestInterface $request)
    {
        return Response::send(200, $this->renderer->render("admin.index",[

            "titleOfcomponent"=> "SERVICES ET VISIONS",
            
            "views"=>$this->renderer->render("menuitems.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Enregistrer un menuitem",
                "element"=>$this->renderer->render("menuitems.admin.save",[
                    "menus"=>$this->menus,
                    "types"=>$this->types
                ])

            ])
        ], true));
    }

    public function executeEdit(RequestInterface $request)
    {
        $code = Security::sanitize($request->getParam("code"));

        $menuitems = $this->model->findAll(["where"=>["code_menuitems='$code'"]]);

        return Response::send(200, $this->renderer->render("admin.index",[

            "titleOfcomponent"=> "SERVICES ET VISIONS",
            
            "views"=>$this->renderer->render("menuitems.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Détails du menuitem",
                "element"=>$this->renderer->render("menuitems.admin.edit",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "menuitems"=>$menuitems,
                    "image_relative"=>$this->getImage_relative($menuitems[0]->getCode_menuitems())
                ])

            ])
        ], true));
    }

    public function getImage_relative(string $code){

      return  $this->renderer->render("menuitems.admin.image_relative",[
                "childrenmenuitems"=>$this->model->findAllChildren(["where"=>["codemenuitems_children_menuitems='$code'"]])
            ]);
    }


     
public function executeSearchmenuitems(RequestInterface $request){

    $data = Security::sanitize($request->formData());

    $criteres = $this->createCritere($data);

    return Response::send(200, $this->renderer->render("menuitems.admin.table",[
        "menuitems"=>$this->model->findAll(["where"=>$criteres])
    ]));
}


private function createCritere($data = []){

    if($data["menu_menuitems"] !== "Tous"){

        $where[] = "menu_menuitems ='".$data["menu_menuitems"]."'";

    }
    
    if($data["type_menuitems"] !== "Tous"){

        $where[] = "type_menuitems ='".$data["type_menuitems"]."'";

    }

    $where[] = !empty($data["dateD"]) ? "date_at_menuitems >= '".$data["dateD"]."'" :"";
    $where[] = !empty($data["dateA"]) ? "date_at_menuitems <= '".$data["dateA"]."'" :"";

    return array_filter($where, fn($item)=> $item !== "");
}
    






   
}