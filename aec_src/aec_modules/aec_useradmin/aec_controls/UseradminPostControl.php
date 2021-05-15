<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls;

use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Useradmin;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\UseradminModel;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_tables\UseradminTable;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_filemanager\FileManager;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class UseradminPostControl extends ControlBack
{

    private ?string $folder = null;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->folder = $container->get("root.img.useradmin");
        $this->model = $this->container->get(UseradminModel::class);
    }
    /**
     * Deconnexion du l'administrateur
     */
     public function executeDisconnectUseradmin(RequestInterface $request){
        unset($this->session["aec_USER_CODE_ADMIN_CONNECTED"]);
        unset($this->session["ADMIN_CONNECTED"]);
     }
    /**
     * Enregistrer des Useradmins
     */
    public function executeSaveUseradmin(RequestInterface $request)
    {
            $data = $request->formData();
            /**
             * Verifier les donnees
             */
            $validator = Create::factory(Validator::class, [$data]);

            $validator->noEmpty("nom_useradmin", "numpiece_useradmin", "prenoms_useradmin", "dateNais_useradmin", "nbenf_useradmin",
            "lieuNais_useradmin", "sexe_useradmin", "sitMatr_useradmin", "contact_useradmin", 
            "email_useradmin", "pays_useradmin", "ville_useradmin", "quartier_useradmin", "login_useradmin", 
            "mdp_useradmin", "codePrivilege_useradmin")->isDate("dateNais_useradmin") ->isMail("email_useradmin")->equalFields("mdp_useradmin", "mdp_repeat");

            /**
             * Traiter les images
             */
            $code=Security::generateCode($this->container->get(UseradminTable::class), "ADM", "code_useradmin");
            
            $imageName = $code."IMG".date("YmdHis");

            $pieceName = $code."PIECE".date("YmdHis");
            
            $filemanager = Create::factory(FileManager::class)
            ->setName("image_useradmin")
            ->setFolder($this->folder)
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg($imageName)
            ->once();

            $filemanager_piece = Create::factory(FileManager::class)
            ->setName("piece_useradmin")
            ->setFolder($this->folder)
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg($pieceName)
            ->once();

            $errors =array_merge($validator->getErrors(), $filemanager->getErrors(), $filemanager_piece->getErrors());

            /**
             * Si il y a des erreurs, les afficher
             */
            
            if(!empty($errors)){

                return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);

            }
                /**
                 * S'il n y a pas d'erreurs creer un objet Useradmin
                 */

                $data = array_merge($data, [
                    "id_useradmin"=>NULL,
                    "code_useradmin"=>$code,
                    "image_useradmin"=> $filemanager->getResult()[0]->getName(),
                    "piece_useradmin"=> $filemanager_piece->getResult()[0]->getName(),
                    "etat_useradmin"=> 0,
                    "loginC_useradmin"=>md5(base64_encode("WGEHDKDKKD2020".$data["login_useradmin"]."WGEHDKDKKD2020")),
                    "mdpC_useradmin"=>md5(base64_encode("WGEHDKDKKD2020".$data["mdp_useradmin"]."WGEHDKDKKD2020")),
                ]);
                
                $useradmin = Create::factory(Useradmin::class, [$data]);
                /**
                 * Appeler le model pour l'insertion
                 */
                $result = $this->model->saveUseradmin($useradmin);
                /**
                 * Verifier l'insertion et afficher le retour au client
                 */
                if($result){
                    /**
                     * Deplacer la photo vers le serveur.
                     */
                        $filemanager->move($this->folder);

                        $filemanager_piece->move($this->folder);
                        
                        $this->insertHistory($this->historyContent(
                            " : DESIGNATION : ".$useradmin->getNom_useradmin()." ".$useradmin->getPrenoms_useradmin(),
                            $useradmin,
                            $useradmin->getCode_useradmin(),
                            "Enregistrement",
                            "Administrateur"
                        ));

                        return Response::sendJson(200, [
                            "status"=>1, 
                            "msg"=>"Opération réussie"
                        ]);
                            
                }else{
                    return Response::sendJson(200, ["status"=>0, "Opéation échouée..."]);
                }
        
    }

/**
 * Mis a jour des Useradmins
 */
public function executeUpdateUseradmin(RequestInterface $request)
{
        $data = $request->formData();
        /**
         * Verifier les donnees
         */
        $validator = Create::factory(Validator::class, [$data]);

        $validator->noEmpty("nom_useradmin", "numpiece_useradmin", "prenoms_useradmin", "dateNais_useradmin", "nbenf_useradmin",
            "lieuNais_useradmin", "sexe_useradmin", "sitMatr_useradmin", "contact_useradmin", 
            "email_useradmin", "pays_useradmin", "ville_useradmin", "quartier_useradmin", "login_useradmin", 
            "mdp_useradmin", "codePrivilege_useradmin")->isDate("dateNais_useradmin") ->isMail("email_useradmin");

        /**
         * Traiter les images
         */
         $errors = [];

         $errors = $validator->getErrors();

         if(FileManager::FILES_EXISTS("image_useradmin")){

            $imageName = $data["code_useradmin"]."IMG".date("YmdHis");          

            $filemanager = Create::factory(FileManager::class)
            ->setName("image_useradmin")
            ->setFolder($this->folder)
            ->setExtensions(FileManager::IMAGE_EXTS())
            ->setNomImg($imageName)
            ->once();

             $errors = array_merge($errors, $filemanager->getErrors()); 
        }

        if(FileManager::FILES_EXISTS("piece_useradmin")){

            $pieceName = $data["code_useradmin"]."PIECE".date("YmdHis");
            
            $filemanager_piece = Create::factory(FileManager::class)
            ->setName("piece_useradmin")
            ->setFolder($this->folder)
            ->setExtensions(FileManager::FILES_EXTS())
            ->setNomImg($pieceName)
            ->once();

             $errors = array_merge($errors, $filemanager_piece->getErrors()); 
        }
        /**
         * Si il y a des erreurs, les afficher
         */
        if(!empty($errors)){
            return Response::sendJson(200, ["status"=>0, "msg"=>$errors]);
        }

            /**
             * S'il n y a pas d'erreurs creer un objet Useradmin_useradmin
             */

            $data_ = array_merge($data, [
                "code_useradmin"=>$data["code_useradmin"],
                "loginC_useradmin"=>md5(base64_encode("WGEHDKDKKD2020".$data["login_useradmin"]."WGEHDKDKKD2020")),
                "mdpC_useradmin"=>md5(base64_encode("WGEHDKDKKD2020".$data["mdp_useradmin"]."WGEHDKDKKD2020")),
            ]);
            /**
             * Supprimer le tableau FILES de l'image
             */
            unset($data_["image_useradmin"]);
            unset($data_["piece_useradmin"]);

            if(FileManager::FILES_EXISTS("image_useradmin")){

                $data_["image_useradmin"] = $filemanager->getResult()[0]->getName();

            }

            if(FileManager::FILES_EXISTS("piece_useradmin")){

                $data_["piece_useradmin"] = $filemanager_piece->getResult()[0]->getName();

            }

            if(isset($data["etat_useradmin"])){

                $data_["etat_useradmin"] = $data["etat_useradmin"];

            }
            if(isset($data["menusForbiden_useradmin"])){

                $data_["menusForbiden_useradmin"] = json_encode($data["menusForbiden_useradmin"] ?? []);

            }
            if(isset($data["actionsForbiden_useradmin"])){

                $data_["actionsForbiden_useradmin"] =json_encode($data["actionsForbiden_useradmin"] ?? []);

            }
            if(isset($data["menusAuthorised_useradmin"])){

                $data_["menusAuthorised_useradmin"] = json_encode($data["menusAuthorised_useradmin"] ?? []);

            }
            if(isset($data["actionsAuthorised_useradmin"])){

                $data_["actionsAuthorised_useradmin"] = json_encode($data["actionsAuthorised_useradmin"] ?? []);

            }
            /**
             *  Si le privilege change, on supprime les anciennes interdictions et autorisations
             */
            if(isset($this->session["ADMIN_CONNECTED"])){

                if($data_["codePrivilege_useradmin"] !== $this->model->find_(["where"=>["code_useradmin='".$data["code_useradmin"]."'"]])->getCodePrivilege_useradmin()){

                    $data_["menusForbiden_useradmin"] = null;
                    $data_["actionsForbiden_useradmin"] =null;
                    $data_["menusAuthorised_useradmin"] = null;
                    $data_["actionsAuthorised_useradmin"] = null;

                }
            }

            $useradmin = Create::factory(Useradmin::class, [$data_]);

            /**
             * Appeler le model pour la modification
             */
            $result = $this->model->updateUseradmin($useradmin);
            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                /**
                 * Deplacer la photo vers le serveur et la piece.
                 */
                if(FileManager::FILES_EXISTS("image_useradmin")){
                    $filemanager->move();
                }
                if(FileManager::FILES_EXISTS("piece_useradmin")){
                    $filemanager_piece->move();
                }

                $this->insertHistory($this->historyContent(
                    $useradmin->getNom_useradmin()." ".$useradmin->getPrenoms_useradmin(),
                    $useradmin,
                    $useradmin->getCode_useradmin(),
                    "Modification",
                    "Administrateur"
                ));

                    return Response::sendJson(200, [
                        "status"=>1, 
                        "msg"=>"Opération réussie"
                    ]);
                        
            }else{
                return Response::sendJson(200, ["status"=>0, "Opéation échouée..."]);
            }
    
}
/**
 * Suppression des Useradmins
 */
public function executeDeleteUseradmin(RequestInterface $request)
{
        
            $data = Security::sanitize($request->formData());

            $useradmin = $this->model->find(["where"=>["code_useradmin='".$data["code_useradmin"]."'"]]);

            $result = $this->model->deleteUseradmin($useradmin);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){
                /**
                 * Supprimer la photo...
                 */

                if(FileManager::fileExists($this->folder.$useradmin->getImage_useradmin())){

                    FileManager::delete($this->folder.$useradmin->getImage_useradmin());
                }

                if(FileManager::fileExists($this->folder.$useradmin->getPiece_useradmin())){

                    FileManager::delete($this->folder.$useradmin->getPiece_useradmin());
                }

                $this->insertHistory($this->historyContent(
                    " : DESIGNATION : ".$useradmin->getNom_useradmin()." ".$useradmin->getPrenoms_useradmin(),
                    $useradmin,
                    $useradmin->getCode_useradmin(),
                    "Suppression",
                    "Administrateur"
                ));

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Suppression réussie",
                    "render"=>$this->container->get(UserAdminGetControl::class)->getTableUseradmin()
                ]);

            }else{
                return Response::sendJson(200, ["status"=>0, "Suppression échouée..."]);
            }
}

    /**
     * Recherche de Useradmin
     */
    public function executeSearchUseradmin(RequestInterface $request)
    {

        $data = Security::sanitize($request->formData());

        $criteres = $this->createCritere($data);

        $users = $this->model->findAllJoin($criteres);

        return Response::send(200, $this->container->get(UserAdminGetControl::class)->getTableUseradmin($users));

    }

    private function createCritere($data = []){

        $criteres = [];

        $criteres[] = "libele_historique = 'Enregistrement'";
        $criteres[] = !empty($data["dateD"]) ? "date(date_at_historique) >= '".$data["dateD"]."'" :"";
        $criteres[] = !empty($data["dateA"]) ? "date(date_at_historique) <= '".$data["dateA"]."'" :"";
        $criteres[] = !empty($data["pays"]) ? "pays_useradmin = '".$data["pays"]."'" :"";
        $criteres[] = !empty($data["ville"]) ? "ville_useradmin = '".$data["ville"]."'" :"";
        $criteres[] = !empty($data["sexe"]) ? "sexe_useradmin = '".$data["sexe"]."'" :"";
        $criteres[] = !empty($data["expr"]) ? "nom_useradmin LIKE '%".$data["expr"]."%'" .
                                             "|| prenoms_useradmin LIKE '%".$data["expr"]."%'".
                                             "|| email_useradmin  LIKE '%".$data["expr"]."%'".
                                             "|| contact_useradmin  LIKE '%".$data["expr"]."%'".
                                             "|| lieuNais_useradmin  LIKE '%".$data["expr"]."%'".
                                             "|| dateNais_useradmin  LIKE '%".$data["expr"]."%'":""
        ;
        return array_filter($criteres, fn($item)=> $item !== "");
    }

}
