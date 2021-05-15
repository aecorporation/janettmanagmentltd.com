<?php

namespace aeCorp\aec_core;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;
use aeCorp\aec_utils\aec_middlewares\RoutePrefixMiddleware;
use aeCorp\aec_utils\aec_router\RouterInterface;

/**
 * Classe abstraite representant une application .
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre 2019.
 * @global
 */
abstract class AppAbstract implements MiddlewareInterface{

    /**
     * Le nom de l'application
     * @var		string	$name
     */
    protected string $name="";

    /**
     * @var		\ae\Config	$config
     */
    protected ?Config $config=null;


    /**
     * @var		array	$modules
     */
    protected array $modules = [];
    /**
     * @var		array	$indepencies
     */
    protected array $dependancies = [];
    /**
     * @var		array	$middlewares
     */
    protected array $middlewares = [];

    protected int $index=0;

    /**
     * @var		mixed	$route
     */
    protected ?RouterInterface $router=null;

    protected ?RequestInterface $request = null;

    /**
     * La fonction pour faire demarrer l'application 
     * Cette fonction referme tout le deroulement de l'application
     * @access public
     * @abstract
     * @return void
     */
    abstract public function run();

    /**
     * Permet d'ajouter un module et si le module a une configuration specifique on 
     * l'ajoute a la liste du ContainerInterface
     * @access	public
     * @return	mixed
     */
    public function addModule(string $key) : self { 
            $this->modules[] = $key;
            if($key::DEFINITION && !empty($key::DEFINITION)) {
                if($this->hasDependancy(ContainerInterface::class)) {
                    $this->dependancy(ContainerInterface::class)->addDefinition($key::DEFINITION);
                }
            }
            return $this ;
    }
    /**
     * Recuper un module.
     *
     * @access	public
     * @param	string	$key	
     * @return	mixed
     */
    public function module(string $key){
        return $this->modules[$key];
    }

    public function getAllModules() : array
    {
        return $this->modules;
    }

/**
 * Undocumented function
 *
 * @param string $dependancy
 * @param [Object| data table] $params
 * @return self
 */
    public function addDependancy(string $dependancy , $params=null): self
    {
        $obj = null;

        if(is_string($dependancy)){

            if(is_array($params)){

                if($params!==null){
                    $obj = Create::factory($dependancy, [$params]);
                }else{
                    
                    $obj =  Create::factory($dependancy);
                }

            }else{
                $obj = $params;
            }
            
        }
        $this->dependancies[$dependancy] = $obj;

        return $this;
    }

    public function dependancy(string $key)
    {
        return $this->dependancies[$key];
    }

    public function hasDependancy(string $key){

        if(array_key_exists($key, $this->dependancies)) {
            return true;
        }
        return false;
    }

    /**
     * Cette fonction prend une chaine de carateres qui est soit un prefix  ou le nom d'un middleware
     * Dans le cas d'un prefix c'est pour verifier les debuts des urls
     *
     * @param string $elem soit un prefix ou le nom d'un middleware
     * @param string|null $middleware
     * @return self
     */
    public function pipe(string $elem, ?string $middleware = null): self
    {
        if($middleware===null){
            $this->middlewares[] = $elem;
        }else{
            $this->middlewares[] = Create::factory(RoutePrefixMiddleware::class, [$this->dependancy(ContainerInterface::class), $elem, $middleware]);
        }
        return $this;
    }


    protected function getMiddleware() : ?MiddlewareInterface 
    {
        if(array_key_exists($this->index, $this->middlewares))
        {
            if(is_string($this->middlewares[$this->index]))
            {
                $middleware = $this->dependancy(ContainerInterface::class)->get($this->middlewares[$this->index]);
            }else{
                $middleware = $this->middlewares[$this->index];
            }
            $this->index++;
            
            return $middleware;
        }
        return null;
    }

    public function process(RequestInterface $request, MiddlewareInterface $middleware0) 
    {
        $middleware= $this->getMiddleware();
        if($middleware !==null) {
            return  $middleware->process($request, $middleware0);
        }
    }
   
    /**
     * Permet d'obtenir la valeur de name
     * 
     * @access	public
     * @return	string
     */ 
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @access	public
     * @param string $name
     * @return  self
     */ 
    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Permet d'obtenir la valeur de config
     * @access public
     * @return Config
     */ 
    public function getConfig() : Config
    {
        return $this->config;
    }

    /**
     * Set the value of config
     *@access public 
    * @param Config $config
     * @return  self
     */ 
    public function setConfig(Config $config) : self
    {
        $this->config = $config;

        return $this;
    }
}