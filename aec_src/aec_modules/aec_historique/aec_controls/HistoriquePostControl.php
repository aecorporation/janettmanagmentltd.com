<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_src\aec_modules\aec_historique\aec_models\HistoriqueModel;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class HistoriquePostControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(HistoriqueModel::class);
    }

/**
 * Enregistrer des Historiques
 */
    public function executeSaveHistorique(array $data)
    {
                $Historique = Create::factory(Historique::class, [$data]);
                /**
                 * Appeler le model pour l'insertion
                 */
                $result = $this->model->save($Historique);
                /**
                 * Verifier l'insertion et afficher le retour au client
                 */
                if($result){
                        return 1;
                }else{
                    return 0;
                }
    }


    
/**
 * Suppression des Historiques
 */
public function executeDeleteHistorique(RequestInterface $request)
{
        
            $data = Security::cleanInput($request->formData());

            $Historique = Create::factory(Historique::class, [$data]);

            $result = $this->model->deleteHistorique($Historique);

            /**
             * Verifier la modification et afficher le retour au client
             */
            if($result){

                return Response::sendJson(200, [
                    "status"=>1, 
                    "msg"=>"Suppression réussie", 
                    
                    // Mettre a jour la liste de Historique du formulaire des recherche
                    "render"=> $this->container->get(HistoriqueGetControl::class)->formsearchHistorique()]);

            }else{
                return Response::sendJson(200, ["status"=>0, "Suppression échouée..."]);
            }
    
        

}

    /**
     * Recherche de Historique
     */
    public function executeSearchHistorique(RequestInterface $request)
    {

            $data = $request->formData();

            $data["code"] = trim($data["code"]);

            /**
             * Selection du priviege
             */
            $priv = $this->model->find($data);
            /**
             * Convertir ses menus en json pour le js
             */
            $menus = json_decode( ($priv !==null) ? $priv->getMenus() : null);

            /**
             * Rendre la vue au client
             */
            $visualiserHistorique = $this->renderer->render("historique.admin.visualiserHistorique",[
                "Historique"=>$priv ?? null,
                "listeMenusActions"=>$this->renderer->render("historique.admin.listeMenusActions",[
                "menus"=> $menus ?? [],   

                ])
            ]);

        return Response::send(200, $visualiserHistorique);

    }
















}
