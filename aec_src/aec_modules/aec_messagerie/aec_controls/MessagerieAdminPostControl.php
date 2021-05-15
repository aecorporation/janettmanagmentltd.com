<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_models\MessagerieModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class MessagerieAdminPostControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(MessagerieModel::class);
    }

    public function executeDeleteMessagerie(RequestInterface $request)
    {
            $id = Security::sanitize($request->getParam("id"));

            $messagerie =  $this->model->findAll(["where"=>["id_messagerie='".$id."'"]])[0];

            $result = $this->model->delete($messagerie);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                $this->insertHistory($this->historyContent(
                    $id,
                    json_encode($messagerie),
                    $id,
                    "Suppression",
                    "Message"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                ]);

            }else{
                return Response::sendJson(200, ["status"=>0, "msg"=>"Opération échouée..."]);
            }
    
    }



}
