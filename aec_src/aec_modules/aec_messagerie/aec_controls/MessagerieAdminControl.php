<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_entities\Messagerie;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_models\MessagerieModel;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class MessagerieAdminControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(MessagerieModel::class);
    }

    public function executeIndex(RequestInterface $request)
    {
        $messages = $this->model->findAll();

        $message = Create::factory(Messagerie::class)
        ->setDateview_messagerie(date("Y-m-d H:i:s"));

        $this->model->update(
        [
        "data"=>$message->arrayData(), 
        "where"=>["dateview_messagerie IS NULL"]]
        );

        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION DE LA MESSAGERIE",
            "views"=>$this->renderer->render("messagerie.admin.index",[
                "element"=>$this->renderer->render("messagerie.admin.list_messagerie",[
                    "table"=>$this->renderer->render("messagerie.admin.table", [
                        "messages"=>$messages
                    ])
                ])
            ])
        ], true));
    }

    public function executeVisualiser(RequestInterface $request)
    {
        $id =Security::sanitize($request->getParam("id"));
        $messagerie = Create::factory(Messagerie::class, [["id_messagerie"=>$id, "etat_messagerie"=>"LU"]]);
        $this->model->update(["data"=>$messagerie->arrayData(), "where"=>["id_messagerie=:id_messagerie"]]);

        $messages = $this->model->findAll(["where"=>["id_messagerie='$id'"]]);
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> $this->message->admin->body->messagerie->title,
            "views"=>$this->renderer->render("messagerie.admin.index",[
                "element"=>$this->renderer->render("messagerie.admin.edit_messagerie",[
                    "messages"=>$messages
                ])
            ])
        ], true));
    }


    
     
public function executeSearchMessagerie(RequestInterface $request){

    $data = Security::sanitize($request->formData());

    $criteres = $this->createCritere($data);

    return Response::send(200, $this->renderer->render("messagerie.admin.table",[
        "messages"=>$this->model->findAll(["where"=>$criteres])
    ]));
}


private function createCritere($data = []){

    if($data["etat"] !== "Tous"){

        $where[] = "etat_messagerie ='".$data["etat"]."'";

    }
    
    if($data["objet"] !== "Tous"){

        $where[] = "objet_messagerie ='".$data["objet"]."'";

    }
    

    $where[] = !empty($data["dateD"]) ? "date_at_messagerie >= '".$data["dateD"]."'" :"";
    $where[] = !empty($data["dateA"]) ? "date_at_messagerie <= '".$data["dateA"]."'" :"";
    $where[] = !empty($data["expr"]) ?  "contenu_messagerie LIKE '%".$data["expr"]."%'".
                                        "|| expediteur_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| destinataire_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| objet_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| date_at_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| etat_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| phone_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| mobile_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| email_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| pays_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| ville_messagerie  LIKE '%".$data["expr"]."%'".
                                        "|| type_messagerie  LIKE '%".$data["expr"]."%'":""
                                             ;

    return array_filter($where, fn($item)=> $item !== "");
}

}
