<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls;

use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_entities\Serviceclient;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models\ServiceclientModel;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_filemanager\FileManager;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class ServiceclientAdminPostControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model=$this->container->get(ServiceclientModel::class);
        $this->folder = $container->get("root.img.site");
    }

    
    public function executeUpdateServiceclient(RequestInterface $request)
    {
             
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator->noEmpty("menu");
        isset($data["titre"]) ? $validator->noEmpty("titre") : null;
        isset($data["details"]) ? $validator->noEmpty("details") : null;
        isset($data["localisation"]) ? $validator->noEmpty("localisation") : null;
        


        $errors = $validator->getErrors();

        if(FileManager::HAS_FILES("image")){

                if(FileManager::FILES_EXISTS("image")){

                $filemanager = Create::factory(FileManager::class)
                ->setName("image")
                ->setExtensions(FileManager::IMAGE_EXTS())
                ->setNomImg("IMG".date("YmdHis"))
                ->once();

                $data["image"] = $filemanager->getResult()[0]->getName();
                
                $errors = array_merge($errors, $filemanager->getErrors());
            }else{
                $data["image"] = $data["image_"];
            }
            
        }

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            ///////////////////////////////

            unset($data["csrf"]);

            $d = [
                "menu_serviceclient"=> $data["menu"],
                "donnees_serviceclient"=>json_encode($data),
                "date_at_serviceclient"=>date("Y-m-d H:i:s")
            ];


            $serviceclient = Create::factory(Serviceclient::class, [$d]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = false;

            if($this->model->count(["menu_serviceclient='".$data["menu"]."'"]) <= 0){
                $result = $this->model->save($serviceclient);
            }else{
                $result = $this->model->update($serviceclient);
            }
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::HAS_FILES("image")){
                    if(FileManager::FILES_EXISTS("image")){
                        $filemanager->move($this->folder);
                    }
                }

                $this->insertHistory($this->historyContent(
                    " avec pour code menu ".$serviceclient->getMenu_serviceclient(),
                    json_encode($serviceclient),
                    $serviceclient->getMenu_serviceclient(),
                    "Modification",
                    "Service client"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }





    }

}
