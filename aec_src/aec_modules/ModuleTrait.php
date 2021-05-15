<?php

namespace aeCorp\aec_src\aec_modules;

/**
 * Permet de regrouper des attributs et methodes partagées
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	.
 * @global
 */
trait ModuleTrait {

      /**
     * Composition des données de l'historique
     */
    public function historyContent(
        ?string $titre = null, 
        $detailsobject = null, 
        ?string $foreignKey = null, 
        ?string $libele = null, 
        ?string $type = null,
        ?string $auteur = null
        ){
    
            $date = date("Y-m-d H:i:s");

            if($auteur === null){
                $auteur = $this->session["ADMIN_CONNECTED"] 
                ? $this->session["ADMIN_CONNECTED"]->getCode_useradmin() 
                : "ADMIN";
            }

            return [
                "titre_historique"=> $titre,
                "detailsobject_historique"=>(is_string($detailsobject)) ? $detailsobject : json_encode($detailsobject),
                "foreignKey_historique"=>$foreignKey,
                "libele_historique"=> $libele,
                "type_historique"=>$type,
                "date_at_historique"=>$date,
                "auteur_historique"=> $auteur
            ];
    
        }

        public function notifyContent(
            ?string $contenu = null, 
            ?string $type = null, 
            ?string $destinataire = null, 
            ?string $expediteur = null,
            ?string $objetconcerne = null
            ){
        
                $date = date("Y-m-d H:i:s");
        
                return [
                    "contenu_notification"=> $contenu,
                    "type_of_notification"=>$type,
                    "destinataire_notification"=>$destinataire,
                    "date_at_notification"=> $date,
                    "expediteur_notification"=>$expediteur,
                    "objetconcerne_notification"=>$objetconcerne
                ];
        
            }

 

}
