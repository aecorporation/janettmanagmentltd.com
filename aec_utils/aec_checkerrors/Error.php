<?php

namespace aeCorp\aec_utils\aec_checkerrors;

class Error
{
    private $key;
    private $rule;
    private $attributes;
    private $messages=[

        "required" => " %s  est requis",
        "empty" => "%s est obligatoire",
        "maxLenght" => "%s doit avoir au plus %d caracteres",
        "minLenght" => "%s doit avoir au moins %d caracteres",
        "betweenLength" => "%s doit avoir entre %d et %d caracteres",
        "dateTime" => "%s doit etre une date valide au format (%s)",
        "email" => "Le format de %s est incorrect",
        "noEqualFields" => " %s est diférent de %s",
        "noEqualTo" => " %s est diférent de %s",

        "errorMoveFile" => "Le fichier %s n'a pu etre deplacé",
        "errorFoundMoveFolder" => "Le dossier %s pour la destination de l'image est introuvable",
        "deleteFileError" => "Erreur de suppression du fichier %s",
        "betweenSizeFile" => "La taille du fichier  %s etre entre %d et %d",
        "minSizeFile" => "La taille du fichier  %s etre plus de %d ",
        "maxSizeFile" => "La taille du fichier  %s etre moins de %d ",
        "invalidFileExtension" => "L'extension %s du champ %s est incorrecte",
       "notFileLoaded_" => "Le fichier %s n'est pas chargé",
        "notFileLoaded" => "Le fichier n'est pas chargé",
        "notCreateFolder"=>"Dossier non crée",
        "notCreateFile" => "Fichier non crée",

        //URL
        "urlNotExists" =>"%s est un lien inexistant",
        "isNotUrl" => "Le format %s est incorrect",


        "existing"=> "La valeur de %s est deja utilisé... ",
        "errorInsert"=> "Echec de l'operation (%s) </br> Contactez le Webmaster",
        "errorUpdate"=> "Echec de l'operation (%s) </br> Contactez le Webmaster",
        "errorDelete" => "Echec de l'operation (%s) </br> Contactez le Webmaster",

        "crsfNoExist"=> "Impossible de continuer car vous n'a aucune autorisation sur la plateforme",
        "maxLengthData" => "Le %s chargé ne doit pas exceder %s",
        "noAccess"=> "Acces Interdit"
    ];

    public function __construct(string $key, string $rule, array $attributes=[])
    {
        $this->key = $key;
        $this->rule = $rule;
        $this->attributes = $attributes;

    }

    public function __toString()
    {
        $params = array_merge([$this->messages[$this->rule], $this->key], $this->attributes);
        return (string) call_user_func_array("sprintf", $params);
    }


    public static function catch(){

        set_error_handler(function ($niveau, $message, $fichier, $ligne) {
            echo 'Erreur : ' . $message . '<br>';
            echo 'Niveau de l\'erreur : ' . $niveau . '<br>';
            echo 'Erreur dans le fichier : ' . $fichier . '<br>';
            echo 'Emplacement de l\'erreur : ' . $ligne . '<br>';
        });
        
    }

}
