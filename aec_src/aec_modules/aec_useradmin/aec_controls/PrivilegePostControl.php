<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Privilege;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\PrivilegeModel;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class PrivilegePostControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules

        $this->model = $this->container->get(PrivilegeModel::class);
    }

/**
 * Enregistrer des privileges
 */
    public function executeSavePrivilege(RequestInterface $request)
    {
            
            $data = $request->formData();

            /**
             * Verifier les donnees
             */
            $validator = Create::factory(Validator::class, [$data]);

            $validator->noEmpty("nom_privilege", "details_privilege");

            $errors = $validator->getErrors();

            /**
             * Si il y a des erreurs, les afficher
             */
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }else{

                /**
                 * S'il n y a pas d'erreurs creer un objet privilege
                 */

                $code = "PRV".uniqid();

                $data = array_merge($data, [
                    "id_privilege"=>NULL,
                    "code_privilege"=>$code,
                    "menus_privilege"=>json_encode($data["menus_privilege"] ?? []),
                    "actions_privilege"=>json_encode($data["actions_privilege"] ?? [])
                ]);
                $privilege = Create::factory(Privilege::class, [$data]);

              //  var_dump($data); exit;
                /**
                 * Appeler le model pour l'insertion
                 */
                $result = $this->model->savePrivilege($privilege);
                /**
                 * Verifier l'insertion et afficher le retour au client
                 */
                if($result === true){
                        
                        $this->insertHistory($this->historyContent(
                            " : DESIGNATION : ".$privilege->getNom_privilege(),
                            $privilege,
                            $privilege->getCode_privilege(),
                            "Enregistrement",
                            "Privilege"
                        ));

                        return Response::sendJson(200, [
                            "status"=>1, 
                            "msg"=>"Opération réussie", 
                            
                            // Mettre a jour la liste de privilege du formulaire des recherche
                            "render"=>$this->container->get(PrivilegeGetControl::class)->listTablePrivilege()
                            ]
                        );
                }else{
                    return Response::sendJson(200, ["status"=>0, "Opéation échouée..."]);
                }
            }
        
    }

/**
 * Mis a jour des privileges
 */
    public function executeUpdatePrivilege(RequestInterface $request)
    {
            
                $data = $request->formData();

                $validator = Create::factory(Validator::class, [$data]);

                /**
                 * Verifier les donnees
                 */
                $validator = Create::factory(Validator::class, [$data]);

                $validator->noEmpty("nom_privilege", "details_privilege");

                $mens = $data["menus_privilege"] ?? [];

                $errors = $validator->getErrors();

                /**
                 * Si il y a des erreurs, les afficher
                 */

                if(!empty($errors)){
                    
                    return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

                }else{

                    /**
                     * S'il n y a pas d'erreurs creer un objet privilege
                     */
                    if(isset($data["menus_privilege"])){
                        $data["menus_privilege"] = json_encode($data["menus_privilege"]);
                    }
                    if(isset($data["actions_privilege"])){
                        $data["actions_privilege"] = json_encode($data["actions_privilege"]);
                    }
                       
                    
                    
                    $privilege = Create::factory(Privilege::class, [$data]);

                    $result = $this->model->updatePrivilege($privilege);

                /**
                 * Verifier la modification et afficher le retour au client
                 */
                if($result){

                    $this->insertHistory($this->historyContent(
                        " : DESIGNATION : ".$privilege->getNom_privilege(),
                        $privilege,
                        $privilege->getCode_privilege(),
                        "Modification",
                        "Privilege"
                    ));

                    return Response::sendJson(200, [
                        "status"=>1, 
                        "msg"=>"Mise a jour réussie", 
                        
                        // Mettre a jour la liste de privilege l'affichage du privilege
                        "render"=>$this->container->get(PrivilegeGetControl::class)->listTablePrivilege()
                    ]);

                }else{
                    return Response::sendJson(200, ["status"=>0, "Mise a jour échouée..."]);
                }
        
            }
    
    }

    
/**
 * Suppression des privileges
 */
public function executeDeletePrivilege(RequestInterface $request)
{
        
            $data = Security::sanitize($request->formData());

            $privilege = $this->model->find(["where"=>["code_privilege = '".$data["code_privilege"]."'"]]);


            $privilege = Create::factory(Privilege::class, [$data]);

            $result = $this->model->deletePrivilege($privilege);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){


                $this->insertHistory($this->historyContent(
                    " : DESIGNATION : ".$privilege->getNom_privilege(),
                    $privilege,
                    $privilege->getCode_privilege(),
                    "Suppression",
                    "Privilege"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Suppression réussie", 
                    
                     // Mettre a jour la liste de privilege l'affichage du privilege
                     "render"=>$this->container->get(PrivilegeGetControl::class)->listTablePrivilege()

                    ]);

            }else{
                return Response::sendJson(200, ["status"=>0, "Suppression échouée..."]);
            }
    
        

}


/**
 * Rechercher des privileges
 */
public function executeSearchPrivilege(RequestInterface $request)
{
        
            $data = Security::sanitize($request->formData());

            $criteres = ["where"=>[
                "code_privilege LIKE '%".$data["search"]."%' || nom_privilege LIKE '%".$data["search"]."%' || details_privilege LIKE '%".$data["search"]."%' "
                ]
            ];

            $privileges = $this->model->findAll($criteres);

            return Response::send(200, $this->container->get(PrivilegeGetControl::class)->listTablePrivilege($privileges));

}

   

















}
