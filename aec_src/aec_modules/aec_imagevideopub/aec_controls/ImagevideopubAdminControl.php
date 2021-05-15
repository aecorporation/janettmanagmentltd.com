<?php

namespace aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class ImagevideopubAdminControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model = $container->get(ImagevideopubModel::class);

        $this->menus = [
            "Aucun"=>"Aucun",
            "qsn"=>"Qui sommes-nous",
            "services"=>"Services",
        ];

        $this->types = [
            "Aucun"=>"Aucun",
            "background"=>"Image de fond"
        ];
    }

    public function executeGestion(RequestInterface $request)
    {
        
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "IMAGES - VIDEOS",
            "views"=>$this->renderer->render("imagevideopub.admin.gestion",[
                "title_1"=>"<i class='fa fa-list'></i> Liste des fichiers",
                "element"=>$this->renderer->render("imagevideopub.admin.list",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "table"=>$this->renderer->render("imagevideopub.admin.table",[
                        "fichiers"=>$this->model->findAll()
                    ])
                ])
            ])
        ], true));
    }

    public function executeSave(RequestInterface $request)
    {
        return Response::send(200, $this->renderer->render("admin.index",[

            "titleOfcomponent"=> "IMAGES - VIDEOS",
            
            "views"=>$this->renderer->render("imagevideopub.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Enregistrer un fichier",
                "element"=>$this->renderer->render("imagevideopub.admin.save",[
                    "menus"=>$this->menus,
                    "types"=>$this->types
                ])

            ])
        ], true));
    }

    public function executeEdit(RequestInterface $request)
    {
        $code = Security::sanitize($request->getParam("code"));

        return Response::send(200, $this->renderer->render("admin.index",[

            "titleOfcomponent"=> "IMAGES - VIDEOS",
            
            "views"=>$this->renderer->render("imagevideopub.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Détails du fichier",
                "element"=>$this->renderer->render("imagevideopub.admin.edit",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "fichiers"=>$this->model->findAll(["where"=>["code_imagevideopub='$code'"]])
                ])

            ])
        ], true));
    }


     
public function executeSearchImagevideopub(RequestInterface $request){

    $data = Security::sanitize($request->formData());

    $criteres = $this->createCritere($data);

    return Response::send(200, $this->renderer->render("imagevideopub.admin.table",[
        "fichiers"=>$this->model->findAll(["where"=>$criteres])
    ]));
}


private function createCritere($data = []){

    if($data["menu_imagevideopub"] !== "Tous"){

        $where[] = "menu_imagevideopub ='".$data["menu_imagevideopub"]."'";

    }
    
    if($data["type_imagevideopub"] !== "Tous"){

        $where[] = "type_imagevideopub ='".$data["type_imagevideopub"]."'";

    }
    
    if($data["etat_imagevideopub"] !== "Tous"){

        $where[] = "etat_imagevideopub ='".$data["etat_imagevideopub"]."'";

    }

    $where[] = !empty($data["dateD"]) ? "date_at_imagevideopub >= '".$data["dateD"]."'" :"";
    $where[] = !empty($data["dateA"]) ? "date_at_imagevideopub <= '".$data["dateA"]."'" :"";

    return array_filter($where, fn($item)=> $item !== "");
}
    






   
}