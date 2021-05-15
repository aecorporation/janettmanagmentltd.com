<?php

namespace aeCorp\aec_src\aec_modules\aec_blog\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_blog\aec_entities\blog;
use aeCorp\aec_src\aec_modules\aec_blog\aec_models\BlogModel;
use aeCorp\aec_src\aec_modules\aec_blog\aec_tables\BlogTable;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_filemanager\FileManager;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class BlogAdminPostControl extends ControlBack{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        
        $this->model = $container->get(BlogModel::class);
        $this->folder = $container->get("root.img.site");
    }

    public function executeSaveblog(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_blog");
      
        
        $code_blog=Security::generateCode($this->container->get(BlogTable::class), "BLG", "code_blog");

        $errors = $validator->getErrors();

        if(FileManager::HAS_FILES("image_blog")){

            $filemanager = Create::factory(FileManager::class)
            ->setName("image_blog")
            ->setExtensions(FileManager::IMAGE_EXTS())
             ->setNomImg("IMG-".$code_blog."-".date("YmdHis"))
            ->once();

            $errors = array_merge($errors, $filemanager->getErrors());

            $data["image_blog"] = $filemanager->getResult()[0]->getName();


        }else{
           // unset($data["image_blog"]);
        }

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }



            ///////////////////////////////

            $data = array_merge($data, ["code_blog"=>$code_blog, "date_at_blog"=>date("Y-m-d H:i:s")]);

            $blog = Create::factory(blog::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->saveblog($blog);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::HAS_FILES("image_blog")){
                    $filemanager->move($this->folder);
                }
                $this->insertHistory($this->historyContent(
                    " MENU ". $blog->getMenu_blog().
                    " >> et pour code ". $blog->getCode_blog(),
                    json_encode($blog),
                    $blog->getCode_blog(),
                    "Enregistrement",
                    "Blog"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}




public function executeUpdateblog(RequestInterface $request)
{
            
        $data = $request->formData();

        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator
        ->noEmpty("titre_blog");

        $errors = $validator->getErrors();

        if(FileManager::HAS_FILES("image_blog")){

            $filemanager = Create::factory(FileManager::class)
            ->setName("image_blog")
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg("IMG-".$data["code_blog"]."-".date("YmdHis"))
            ->once();

            $data["image_blog"] = $filemanager->getResult()[0]->getName();
            
            $errors = array_merge($errors, $filemanager->getErrors());
        }else{
            //unset($data["image_blog"]);
        }

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }

            ///////////////////////////////

            $blog = Create::factory(blog::class, [$data]);
          
            /**
             * Appeler le model pour l'insertion
             */
            $result = $this->model->updateblog($blog);
            /**
             * Verifier l'insertion et afficher le retour au client
             */
            if($result === true){

                if(FileManager::HAS_FILES("image_blog")){
                    $filemanager->move($this->folder);
                }

                $this->insertHistory($this->historyContent(
                    " MENU ". $blog->getMenu_blog().
                    " >> et pour code ". $blog->getCode_blog(),
                    json_encode($blog),
                    $blog->getCode_blog(),
                    "Enregistrement",
                    "Blog"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Opération réussie"
                    ]);
            }else{
                return Response::sendJson(200, ["status"=>0, "Opération échouée..."]);
            }
        
}



public function executeDeleteblog(RequestInterface $request)
    {
            $code = Security::sanitize($request->getParam("code"));

            $blog =  $this->model->findAll(["where"=>["code_blog='".$code."'"]])[0];

            $result = $this->model->delete($blog);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                $this->insertHistory($this->historyContent(
                    $code,
                    json_encode($blog),
                    $code,
                    "Suppression",
                    "Blog"
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