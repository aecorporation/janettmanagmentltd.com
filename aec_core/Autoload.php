<?php

namespace aeCorp\aec_core;

/**
 * Classe permettant de charger automatique les classe 
 * instancier dans toute l'application.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre 2019.
 * @global
 */
class Autoload{


    /**
     * methode permettant d'inclure les fichier relative au classes instanciées
     *
     * @access	private static
     * @param	string	$name	
     * @return	void
     */
    private  static function requireClass(string $className){
        $folderCureent= __DIR__;
        $getFile="";
        $classNew="";

        if (strpos($className, "aeCorp\\")===0) {
            $classNew = str_replace("aeCorp", "", $className);
        }else{
            $classNew= "\\".$className;
        }
            $ROOT = dirname($folderCureent); // A la racine

           

            $newFile = str_replace("\\","/", $classNew).".php";

            $getFile = $ROOT. $newFile;

            if(\file_exists(($getFile))){
                require $getFile;
            }else{
                throw new \Exception("Classe introuvale : ".$getFile);
            }

     
     
}

    /**
     * Methode d'execuion de methode FICHIER 
     * des appels des fichiers de classes
     *
     * @access	public static
     * @return	void
     */
    public static function LOADER(){
       spl_autoload_register(array(__CLASS__, "requireClass"));
    }
    
}