<?php

namespace aeCorp\aec_utils\aec_factory;

use ReflectionClass;

/**
 * Permet d'intancier  toutes les classes de l'application.
 * Design patter Factory 
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi 9 Decembre  2019.
 * @global
 */

class Container implements ContainerInterface{

    private array $definitions=[];
    private array $instances=[];
    private array $addElements=[];

    /**
     * __construct.
     *
     * @author	Unknown
     * @since	v0.0.1
     * @version	v1.0.0	Monday, December 16th, 2019.
     * @access	public
     * @param	string	$definitonPath	
     * @return	void
     */
    public function __construct(?array $definitions = [])
    {
        $this->instances = [
            ContainerInterface::class=>$this
        ];
        if(!empty($definitions)){
            $this->addDefinition($definitions);
        }
    }

    /**
     * Undocumented function
     *
     * @param string | array $definitonPath
     * @return ContainerInterface
     */
    public function addDefinition(?array $definitions=[]) : ContainerInterface
    {
        //   var_dump($definitions);
      if(is_array(($definitions))){
            
            foreach ($definitions as $definition) {

                $content = require $definition;

                $this->instances = array_merge($this->instances, $content);

                $this->definitions[] = $definitions;
            }
        }
            return $this;
    }
    public function set(string $key, $value) : ContainerInterface
    {
        if(is_string($key))
        {
                $this->instances[$key] = $value;
        }
        return $this;
         
    }
    public function addArray(string $key, array $value) : ContainerInterface
    {
            if(in_array($key, array_keys($this->instances))){

                if(is_array($this->instances[$key]) && is_array($value)){
                    $this->instances[$key] = array_merge($this->instances[$key], $value);
                }else{
                    throw new  \Exception("Erreur de données");
                }

            }else{
                throw new  \Exception("Cette clé n'existe pas, utilisez la methode set");
            }

        return $this;    
    }
    /**
     *  si la clé existe, on retourne l'instance dans le tableau correspondans a l'indice.
     *si non on resouds le probleme de la cle avec la methode private resolve
     * si c'est le non d'une classe existante dans l'application
     * on l'enregistre dans le tableau et on retourne l'instance
     * 
     * @access	public
     * @param	string	$key	
     * @return	mixed
     */
    public function get(string $key)
    {
        if($this->has($key)) {
            return $this->instances[$key];
        }
        return $this->resolve($key);
    }

    public function has(string $key) : bool {

        if(array_key_exists($key, $this->instances)){
            return true;
        }
        return false;
    }

    public function getAllInstances() : array{
            return $this->instances;
    }

    public function getAllDefinitions(): array
    {
        return $this->definitions;
    }
    
    //  Liste des methodes privées

    private function resolve(string $key){
       
         $reflectionClass= new ReflectionClass($key);

            if($reflectionClass->isInstantiable()) {
                
                    $constructor= $reflectionClass->getConstructor();

                    if(!is_null($constructor)){

                    $params = $constructor->getParameters();
                   
                            if(count($params)>0) {

                                $tabsParams=[];

                                foreach ($params as $param) {

                                    // Si le parametre est une classe
                                    if($param->getClass()) {
                                      
                                            //Si la clé existes dans le tableau
                                            if($this->has($param->getClass()->getName())) {
                                                $tabsParams[] = $this ->get($param->getClass()->getName());
                                            }else{
                                                $tabsParams[] = $this->get($param->getClass()->getName());
                                            }
                                    }else{

                                        if($param->isDefaultValueAvailable()){
                                            $tabsParams[] = $param->getDefaultValue();
                                        }

                                       
                                    }
                                }
                                    $class=$reflectionClass->newInstanceArgs($tabsParams);
                            }else{
                                    $class = $reflectionClass->newInstance();
                            }
                                }else{
                                            $class = $reflectionClass->newInstance();
                                }

                    $this->set($key,  $class);
                    return  $this->get($key);

                    }else{
                        exit($key." n'est pas instanciable");
                    }
    }
}