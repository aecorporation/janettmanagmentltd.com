<?php

namespace aeCorp\aec_core;

/**
 * Classe abstraite qui permet aux classe qui l'herite 
 * de beneficier des parametre de la classe Application
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9  Decembre 2019.
 * @global
 */
abstract class Component
{

    /**
     * 
     * @var		Application	$app
     */
    protected $app=null;

    /**
     * __construct.
     *
     * @access	public
     * @param	Application	$app	
     * @return	void
     */
    public function __construct(Application $app){
        $this->app=$app;
    }

   


    /**
     * Obtenir la value de l'application en cours
     * @return Application
     */ 
    public function getApp() : Application
    {
        return $this->app;
    }
}