<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Children_menuitems;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities\Menuitems;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_models\MenuitemsModel;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables\Children_menuitemsTable;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_tables\MenuitemsTable;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_filemanager\FileManager;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class MenuitemsAdminPostControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        
        $this->model = $container->get(MenuitemsModel::class);
        $this->folder = $container->get("root.img.menuitems");
    }

    public function executeSavemenuitems(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_menuitems")
        ->noEmpty("details_menuitems")
        ->noEmpty("menu_menuitems")
        ->noEmpty("type_menuitems");
      
        
        $code_menuitems=Security::generateCode($this->container->get(MenuitemsTable::class), "MITM", "code_menuitems");

        $errors = $validator->getErrors();

            if(FileManager::FILES_EXISTS("image_menuitems")){

                $filemanager = Create::factory(FileManager::class)
                ->setName("image_menuitems")
                ->setExtensions(FileManager::IMAGE_EXTS())
                ->setNomImg("IMG-".$code_menuitems."-".date("YmdHis"))
                ->once();
    
                $data["image_menuitems"] = $filemanager->getResult()[0]->getName();
                
                $errors = array_merge($errors, $filemanager->getErrors());

                $data["image_menuitems"] = $filemanager->getResult()[0]->getName();

                $errors = array_merge($errors, $filemanager->getErrors());


            }else{
                unset($data["image_menuitems"]);
            }


            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }



            ///////////////////////////////

            $data = array_merge($data, ["code_menuitems"=>$code_menuitems, "date_at_menuitems"=>date("Y-m-d H:i:s")]);

            $menuitems = Create::factory(Menuitems::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->savemenuitems($menuitems);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::FILES_EXISTS("image_menuitems")){
                    $filemanager->move($this->folder);
                }
                
                $this->insertHistory($this->historyContent(
                    " ITEM avec pour titre << ". $menuitems->getTitre_menuitems().
                    " >> et pour code ". $menuitems->getCode_menuitems(),
                    json_encode($menuitems),
                    $menuitems->getCode_menuitems(),
                    "Enregistrement",
                    "Menusitems"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}




public function executeUpdatemenuitems(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_menuitems")
        ->noEmpty("details_menuitems")
        ->noEmpty("menu_menuitems")
        ->noEmpty("type_menuitems");

        $errors = $validator->getErrors();

        if(FileManager::FILES_EXISTS("image_menuitems")){

            $filemanager = Create::factory(FileManager::class)
            ->setName("image_menuitems")
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg("IMG-".$data["code_menuitems"]."-".date("YmdHis"))
            ->once();

            $data["image_menuitems"] = $filemanager->getResult()[0]->getName();
            
            $errors = array_merge($errors, $filemanager->getErrors());
        }else{
            unset($data["image_menuitems"]);
        }

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            ///////////////////////////////

            $menuitems = Create::factory(menuitems::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->updatemenuitems($menuitems);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::FILES_EXISTS("image_menuitems")){
                    $filemanager->move($this->folder);
                }

                $this->insertHistory($this->historyContent(
                    " ITEM avec pour titre << ". $menuitems->getTitre_menuitems().
                    " >> et pour code ". $menuitems->getCode_menuitems(),
                    json_encode($menuitems),
                    $menuitems->getCode_menuitems(),
                    "Modification",
                    "Menusitems"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}



public function executeDeletemenuitems(RequestInterface $request)
    {
            $code = Security::sanitize($request->getParam("code"));

            $image =  $this->model->findAll(["where"=>["code_menuitems='".$code."'"]])[0];

            $result = $this->model->delete($image);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                $this->insertHistory($this->historyContent(
                    $code,
                    json_encode($image),
                    $code,
                    "Suppression",
                    "Menusitems"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                ]);

            }else{
                return Response::sendJson(200, ["status"=>0, "msg"=>"Opération échouée..."]);
            }
    
    }













    public function executeSavechildrenmenuitems(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("contenu_children_menuitems");
      
        
        $code_children_menuitems=Security::generateCode($this->container->get(Children_menuitemsTable::class), "CHLMITMS", "code_children_menuitems ");

        $errors = $validator->getErrors();

            if(FileManager::FILES_EXISTS("image_children_menuitems")){

                $filemanager = Create::factory(FileManager::class)
                ->setName("image_children_menuitems")
                ->setExtensions(FileManager::IMAGE_EXTS())
                ->setNomImg("IMG-".$code_children_menuitems."-".date("YmdHis"))
                ->once();
    
                $data["image_children_menuitems"] = $filemanager->getResult()[0]->getName();
                
                $errors = array_merge($errors, $filemanager->getErrors());

                $data["image_children_menuitems"] = $filemanager->getResult()[0]->getName();

                $errors = array_merge($errors, $filemanager->getErrors());


            }else{
                unset($data["image_children_menuitems"]);
            }


            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }



            ///////////////////////////////

            $data = array_merge($data, ["code_children_menuitems"=>$code_children_menuitems, "date_at_children_menuitems"=>date("Y-m-d H:i:s")]);

            $children_menuitems = Create::factory(Children_menuitems::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->savechildrenmenuitems($children_menuitems);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::FILES_EXISTS("image_children_menuitems")){
                    $filemanager->move($this->folder);
                }
                
                $this->insertHistory($this->historyContent(
                    "Image d.item avec pour code ". $children_menuitems->getCode_children_menuitems(),
                    json_encode($children_menuitems),
                    $children_menuitems->getCode_children_menuitems(),
                    "Enregistrement",
                    "children_menuitems"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie",
                    "views"=>$this->container->get(menuitemsAdminControl::class)
                    ->getImage_relative($children_menuitems->getCodemenuitems_children_menuitems())
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}




public function executeUpdatechildrenmenuitems(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator->noEmpty("contenu_children_menuitems");


        $errors = $validator->getErrors();

        if(FileManager::FILES_EXISTS("image_children_menuitems")){

            $filemanager = Create::factory(FileManager::class)
            ->setName("image_children_menuitems")
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg("IMG-".$data["code_children_menuitems"]."-".date("YmdHis"))
            ->once();

            $data["image_children_menuitems"] = $filemanager->getResult()[0]->getName();
            
            $errors = array_merge($errors, $filemanager->getErrors());
        }else{
            unset($data["image_children_menuitems"]);
        }

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            ///////////////////////////////

            $children_menuitems = Create::factory(Children_menuitems::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->updatechildrenmenuitems($children_menuitems);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::FILES_EXISTS("image_children_menuitems")){
                    $filemanager->move($this->folder);
                }

                $this->insertHistory($this->historyContent(
                    "Image d'item avec pour code ". $children_menuitems->getCode_children_menuitems(),
                    json_encode($children_menuitems),
                    $children_menuitems->getCode_children_menuitems(),
                    "Modification",
                    "children_menuitems"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie",
                    "views"=>$this->container->get(menuitemsAdminControl::class)
                    ->getImage_relative($children_menuitems->getCodemenuitems_children_menuitems())

                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}



public function executeDeletechildrenmenuitems(RequestInterface $request)
    {
            $code = Security::sanitize($request->getParam("code"));

            $children_menuitems =  $this->model->findAllChildren(["where"=>["code_children_menuitems='".$code."'"]])[0];

            $result = $this->model->deletechildren_menuitems($children_menuitems);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                $this->insertHistory($this->historyContent(
                    $code,
                    json_encode($children_menuitems),
                    $code,
                    "Suppression",
                    "children_menuitems"
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