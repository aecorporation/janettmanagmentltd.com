<?php

namespace aeCorp\aec_src\aec_modules\aec_blog\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_blog\aec_models\BlogModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class BlogAdminControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model = $container->get(BlogModel::class);

        $this->menus = [
            "qsn"=>"Qui sommes nous",
            "services"=>"Services",
            "mission-et-vision"=>"Mission et vision",
            "contact"=>"Contact",
            "envoi_message"=>"Envoi de message"
        ];

        $this->types = [];
    }

    public function executeGestion(RequestInterface $request)
    {
        
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION DU BLOG",
            "views"=>$this->renderer->render("blog.admin.gestion",[
                "title_1"=>"<i class='fa fa-list'></i> Liste des contenus",
                "element"=>$this->renderer->render("blog.admin.list",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "table"=>$this->renderer->render("blog.admin.table",[
                        "blogs"=>$this->model->findAll()
                    ])
                ])
            ])
        ], true));
    }

    public function executeSave(RequestInterface $request)
    {
        return Response::send(200, $this->renderer->render("admin.index",[

            "titleOfcomponent"=> "GESTION DU BLOG",
            
            "views"=>$this->renderer->render("blog.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Enregistrer un menu du blog",
                "element"=>$this->renderer->render("blog.admin.save",[
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

            "titleOfcomponent"=> "GESTION DU BLOG",
            
            "views"=>$this->renderer->render("blog.admin.gestion",[
                "title_1"=>"<i class='fa fa-save'></i> Détails du contenu",
                "element"=>$this->renderer->render("blog.admin.edit",[
                    "menus"=>$this->menus,
                    "types"=>$this->types,
                    "blogs"=>$this->model->findAll(["where"=>["code_blog='$code'"]])
                ])

            ])
        ], true));
    }


     
public function executeSearchblog(RequestInterface $request){

    $data = Security::sanitize($request->formData());

    $criteres = $this->createCritere($data);

    return Response::send(200, $this->renderer->render("blog.admin.table",[
        "blogs"=>$this->model->findAll(["where"=>$criteres])
    ]));
}


private function createCritere($data = []){

    if($data["menu_blog"] !== "Tous"){

        $where[] = "menu_blog ='".$data["menu_blog"]."'";

    }

    $where[] = !empty($data["dateD"]) ? "date_at_blog >= '".$data["dateD"]."'" :"";
    $where[] = !empty($data["dateA"]) ? "date_at_blog <= '".$data["dateA"]."'" :"";

    return array_filter($where, fn($item)=> $item !== "");
}
    






   
}