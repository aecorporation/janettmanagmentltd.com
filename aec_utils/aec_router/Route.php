<?php

namespace aeCorp\aec_utils\aec_router;

/**
 * Represente toutes les routes de l'application.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre 2019.
 * @global
 */
class Route implements RouteInterface{

    private string $name="";
    private string $callable = "";
    private array $params = [];

    /**
     * __construct.
     *
     * @author	Unknown
     * @since	v0.0.1
     * @version	v1.0.0	Wednesday, December 18th, 2019.
     * @access	public
     * @param	string	$name    	
     * @param	mixed 	$callable	/ string
     * @param	array 	$param   	
     * @return	void
     */
    public function __construct(string $name, $callable, array $params=[]){
        $this->name=$name;
        $this->callable= $callable;
        $this->params = $params;
    }

    /**
     * Nom de la route
     * .
     * @access	public
     * @return	string
     */
    public function getName(): string{
       return $this->name;
    }
    /**
     * La fonction appelée pour la route.
     *
     * @author	Unknown
     * @since	v0.0.1
     * @version	v1.0.0	Wednesday, December 18th, 2019.
     * @access	public
     * @return	callable / string
     */
    public function getCallable(){
        return $this->callable;
    }
    /**
     * Les parametres relatives a la route
     * .
     * @access	public
     * @return	array liste de chaine de caracteres
     */
    public function getParams(): array{
        return $this->params;

    }


}