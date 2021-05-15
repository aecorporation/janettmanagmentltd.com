<?php

namespace aeCorp\aec_utils\aec_factory;

/**
 * Permet d'intancier  toutes les classes de l'application.
 * Design patter Factory 
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi 9 Decembre  2019.
 * @global
 */
class Create{

    /**
     * @var		static	$_registries
     */
    private static array $_registries=[];
    /**
     * @var		static	$_instance
     */
    private static array $_instances=[];

    /**
     * Instancie les classes de maniere recursive.
     *
     * @access	public static
     * @param	mixed	$name	
     * @param	mixed	$arg 	
     * @return	void
     */

     public static function factory (string $name, ?array $args = null) 
     {
        
               $obj=null;
               
                $reflection_class = new \ReflectionClass($name);

                if ($reflection_class->isInstantiable()) { // si la classe est instanciable

                    $constructor = $reflection_class->getConstructor(); // Recupere constructor

                    if (!\is_null($constructor)) { // si il y a un  constructeur

                        $params = $constructor->getParameters();
                        
                        if (count($params) <= 0) { // Aucun parametre au constructeur
                         $obj = $reflection_class->newInstance();
                        } else { 
                            // si il ya des parametres au constructeur
                            if ($args!==null) { // Si $args n'est pas null
                                $obj = $reflection_class->newInstanceArgs($args);
                            } else {
                                $tabsParams = [];
                                
                                foreach ($params as $param) {
                                    if ($param->getClass()) {
                                        $tabsParams[] = self::factory($param->getClass()->getName());
                                    } else {

                                        if($param->isDefaultValueAvailable()){
                                            $tabsParams[] = $param->getDefaultValue();
                                        }                                    
                                    }
                                }
                      
                            $obj = $reflection_class->newInstanceArgs($tabsParams);
                          
                            }
                        }
                    } else { // si il n'ya aucun constructor
                $obj = $reflection_class->newInstance();
                    }
                } else {
                    throw new \ReflectionException("Impossible d'instancier la classe " . $name, 1);
                }
                return    $obj;

     }
    public static function instance(string $name, array $args=null){

        if(!isset(self::$_instances[$name])){
            if(isset(self::$_registries[$name])){
                 self::$_instances[$name]=self::$_registries[$name];
            }else{
                $reflection_class=new \ReflectionClass($name);

                if($reflection_class->isInstantiable()){ // si la classe est instanciable
                    $constructor=$reflection_class->getConstructor(); // Recupere constructor

                    if(!\is_null($constructor)){ // si il y a un  constructeur

                    $params=$constructor->getParameters();
                    if(count($params)<=0){ // Aucun parametre au constructeur
                        self::$_instances[$name]=$reflection_class->newInstance();
                    }else{// si il ya des parametres au constructeur

                        if(!\is_null($args)){ // Si $args n'est pas null
                            self::$_instances[$name]=$reflection_class->newInstanceArgs($args);
                        }else{

                             $tabsParams=[];
                        foreach ($params as $param) {
                            if($param->getClass()){
                                 $tabsParams[]=self::instance($param->getClass()->getName());
                            }else{
                                $tabsParams[]=$param;
                            }
                        }
                          self::$_instances[$name]=$reflection_class->newInstanceArgs($tabsParams);

                        }
                       
                    }
                    }else{ // si il n'ya aucun constructor
                         self::$_instances[$name]=$reflection_class->newInstance();
                    }
                }else{
                     throw new \ReflectionException("Impossible d'instancier la classe ".$name, 1);
                }
            }
           
        }
        return   self::$_instances[$name];
    }

}