<?php

namespace aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_entities\Imagevideopub;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_tables\ImagevideopubTable;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_filemanager\FileManager;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class ImagevideopubAdminPostControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        
        $this->model = $container->get(ImagevideopubModel::class);
        $this->folder = $container->get("root.img.imagevideopub");
    }

    public function executeSaveimagevideopub(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_imagevideopub")
        ->noEmpty("details_imagevideopub")
        ->noEmpty("position_imagevideopub")
        ->noEmpty("type_imagevideopub")
        ->noEmpty("etat_imagevideopub")
        ->noEmpty("focus_imagevideopub");
      
        
        $code_imagevideopub=Security::generateCode($this->container->get(ImagevideopubTable::class), "IMVDPB", "code_imagevideopub");

        $errors = $validator->getErrors();

            $filemanager = Create::factory(FileManager::class)
            ->setName("fichier_imagevideopub")
            ->setExtensions(FileManager::MULTIPLE_EXTS())
             ->setNomImg("FCH-".$code_imagevideopub."-".date("YmdHis"))
            ->once();

            $errors = array_merge($errors, $filemanager->getErrors());

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            $data["fichier_imagevideopub"] = $filemanager->getResult()[0]->getName();


            ///////////////////////////////

            $data = array_merge($data, ["code_imagevideopub"=>$code_imagevideopub, "date_at_imagevideopub"=>date("Y-m-d H:i:s")]);

            $imagevideopub = Create::factory(Imagevideopub::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->saveImagevideopub($imagevideopub);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                $filemanager->move($this->folder);

                $this->insertHistory($this->historyContent(
                    $imagevideopub->getTypefile_imagevideopub().
                    " avec pour titre << ". $imagevideopub->getTitre_imagevideopub().
                    " >> et pour code ". $imagevideopub->getCode_imagevideopub(),

                    json_encode($imagevideopub),
                    $imagevideopub->getCode_imagevideopub(),
                    "Enregistrement",
                    "Fichier"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}




public function executeUpdateimagevideopub(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_imagevideopub")
        ->noEmpty("details_imagevideopub")
        ->noEmpty("position_imagevideopub")
        ->noEmpty("type_imagevideopub")
        ->noEmpty("etat_imagevideopub")
        ->noEmpty("focus_imagevideopub");

        $errors = $validator->getErrors();


        if(FileManager::FILES_EXISTS("fichier_imagevideopub")){

            $filemanager = Create::factory(FileManager::class)
            ->setName("fichier_imagevideopub")
            ->setExtensions(FileManager::MULTIPLE_EXTS())
            ->setNomImg("FCH-".$data["code_imagevideopub"]."-".date("YmdHis"))
            ->once();

            $data["fichier_imagevideopub"] = $filemanager->getResult()[0]->getName();
            
            $errors = array_merge($errors, $filemanager->getErrors());

        }else{
            unset($data["fichier_imagevideopub"]);
        }


            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            ///////////////////////////////

            $imagevideopub = Create::factory(Imagevideopub::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->updateImagevideopub($imagevideopub);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::FILES_EXISTS("fichier_imagevideopub")){
                    $filemanager->move($this->folder);
                }

                $this->insertHistory($this->historyContent(
                    $imagevideopub->getTypefile_imagevideopub().
                    " avec pour titre << ". $imagevideopub->getTitre_imagevideopub().
                    " >> et pour code ". $imagevideopub->getCode_imagevideopub(),

                    json_encode($imagevideopub),
                    $imagevideopub->getCode_imagevideopub(),
                    "Modification",
                    "Fichier"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}



public function executeDeleteImagevideopub(RequestInterface $request)
    {
            $code = Security::sanitize($request->getParam("code"));

            $fichier =  $this->model->findAll(["where"=>["code_imagevideopub='".$code."'"]])[0];

            $result = $this->model->delete($fichier);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                $this->insertHistory($this->historyContent(
                    $code,
                    json_encode($fichier),
                    $code,
                    "Suppression",
                    "Fichier"
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