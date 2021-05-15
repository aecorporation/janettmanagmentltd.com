<?php

namespace aeCorp\aec_src;

use aeCorp\aec_core\AppAbstract;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;

/**
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	28  janvier  2020.
 * @see		Application
 * @global
 */
class App extends AppAbstract
{
    /**
     * Constructeur
     * @access	public
     * @return	void
     */
        /** ContainerInterface est une dependance de l'application chaque 
         * module est recuperé depuis le ContainerInterface ou il est instancié
        */
    public function run()
    {
        //Les variables globale de SERVER
        $this->dependancy(ContainerInterface::class)->get(RequestInterface::class)->initServer();
        // Instancier tous les modules

        foreach($this->modules as $module) {

            $this->dependancy(ContainerInterface::class)->get($module);

        }
       // var_dump($this->dependancy(ContainerInterface::class)->getAllDefinitions());
        // Mettre en marche les middleware
        $this->process($this->dependancy(ContainerInterface::class)->get(RequestInterface::class), $this);
    }

    
}