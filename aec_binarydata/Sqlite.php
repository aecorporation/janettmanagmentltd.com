<?php

namespace aeCorp\binarydata;

/**
 * Connexion a la base de donnees sqlite et implemente l'interface InterfaceData.
 *
 * @author	Unknown
 * @since	v0.0.1
 * @version	v1.0.0	Monday, December 9th, 2019.
 * @global
 */
class Sqlite implements InterfaceData{

    private static $pdo=null;

    /**
     * Methode de l'interface InterfaceData .
     *
     * @access	public static
     * @return	mixed
     */
    public static function getConnexion(){

        if(is_null(self::$pdo)){
                  self::$pdo=new \PDO('sqlite:'.__DIR__.'/../ae_config/ae_db/dbinary.db');
                self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_TIMEOUT, 0);

        }
       
        return self::$pdo;
    }

    
}