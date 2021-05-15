<?php

namespace aeCorp\aec_core;

use \ae\InterfaceData;

/**
 * Dao.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi,9 Decembre, 2019.
 * @global
 */
abstract class Dao{

    /**
     * Objet de connexion
     * @var		mixed	$dao
     * 
     */
    protected $dao=null;
    /**
     * COntructeur .
     *
     * @access	public
     * @param	interfacedata	$data	
     * @return	void
     */
    public function __construct(InterfaceData $data){
        $this->dao=$data->$data->connect();
    }
}