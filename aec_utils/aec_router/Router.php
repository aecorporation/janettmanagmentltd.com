<?php

namespace aeCorp\aec_utils\aec_router;

use aeCorp\aec_utils\aec_router\Route;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\Request;
use aeCorp\aec_utils\aec_request\RequestInterface;

/**
 * Permet d'ajouter une nouvelle route et retourner la route demandée.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi,9 Decembre  2019.
 * @global
 */
class Router implements RouterInterface{

    protected array $apps=[];
    protected array $modules=[];
    protected array $gets=[];
    protected array $posts = [];
    protected array $puts = [];
    protected array $deletes = [];
    protected int $index = 0;
    protected array $routes = [];
    protected ?RequestInterface $request = null;
    protected ?string $lang=null;
    protected ?string $lang_=null;
    protected ?array $languages = ["fr","en"];

    public function __construct(RequestInterface $request=null)
    {
            if(php_sapi_name()!=="cli"){

            $request->initServer();
            $url = $request->getUri();
            $lang = explode("/", $url)[1];

            if(in_array($lang, $this->languages)){

                if($lang!="fr"){
                    $this->setLang($lang);
                }
                $this->lang_="/".$lang;
            }

        }
    }

    
    /**
     * Ajoute une nouvelle route.
     *
     * @author	Unknown
     * @since	v0.0.1
     * @version	v1.0.0	Wednesday, December 18th, 2019.
     * @access	public
     * @param	string	$path    	
     * @param	mixed 	$callable	/ string
     * @param	array	$params ,[module, url name, Description]    	
     * @return	void
     */
    public function get(string $path, $callable, array $params=[]) : RouterInterface
    {

        $this->gets = $this->routerManager($this->gets, $path, $callable, $params);
        return $this;
    }

    public function post(string $path, $callable, array $params=[]): RouterInterface
    {
        $this->posts = $this->routerManager($this->posts, $path, $callable, $params);
        return $this;
    }

    public function put(string $path, $callable,  array $params=[]): RouterInterface
    {
        $this->puts = $this->routerManager($this->puts, $path, $callable, $params);
        return $this;
    }
    public function delete(string $path, $callable,  array $params=[]): RouterInterface
    {
        $this->delete = $this->routerManager($this->deletes, $path, $callable, $params);
        return $this;
    }

    private function routerManager(array $table, string $path, $callable,  array $params=[]) : array{

        $tabs = explode(".", $params["name"]);

        if(!array_key_exists($tabs[0], $table)){
            $table[$tabs[0]]=[];
        }
        if(!array_key_exists($tabs[1], $table[$tabs[0]])){
            $table[$tabs[0]][$tabs[1]]=[];
        }

        if (array_key_exists($params["name"], $table[$tabs[0]][$tabs[1]])) {
             throw new \Exception("La cle ".$params["name"]." existe dans le tableau GET", 1);
        } 
        $url = $this->lang_.$path;
        $definitionRoots=["uri"=> $this->parseUrl($this->removeslash($url)), "callable"=>$callable, "name"=>$params["name"], "title"=>$params["title"] ?? "", "icon"=>$params["icon"] ?? "", "description"=>$params["description"]?? "..."];
        

        $table[$tabs[0]][$tabs[1]][$params["name"]] = $definitionRoots;

        $this->routes[$params["name"]]= $definitionRoots;

        return $table;

    }

    public function getRoutes() : array 
    {
        return $this->routes;
    }

    public function getRoutesGets() : array 
    {
        return $this->gets;
    }

    public function getRoutesPosts() : array 
    {
        return $this->posts;
    }

    public function getRoutesPuts() : array 
    {
        return $this->puts;
    }

    public function getRoutesDelete() : array 
    {
        return $this->deletes;
    }


    /**
     * Verifier si url est correct.
     *
     * @access	public
     * @param	string	$url	
     * @return	void
     */
    public function match(RequestInterface $request) : ?RouteInterface
    {
        $this->request = $request;
        // Les gets
        if($request->getMethod() === "GET"){
                
            return $this->checkedUrlExists($this->gets);
        }
        if ($request->getMethod() === "POST") {

            return $this->checkedUrlExists($this->posts);
        }

        if ($request->getMethod() === "PUT") {

             return $this->checkedUrlExists($this->puts);
        }
        if ($request->getMethod() === "DELETE") {

            return $this->checkedUrlExists($this->deletes);
       }

    }

    /**
     * Retourne la bonne route.
     *
     * @access	public
     * @param	string	$url	
     * @return	void
     */
    public function generateUri(string $name, ?array $params=[]) : ?string{

        if (array_key_exists($name, $this->routes))
        {
            $etape1 = \preg_replace_callback('/\(\?P\<([a-z_-]*)\>([^\/]+)/',
            
            function($matches) use ($params){

                if(array_key_exists($matches[1], $params)){

                    return $params[$matches[1]];
                }

            },
            $this->routes[$name]["uri"]
        );

            return $etape1;
        } 
        return null;
    }

    public function getLang_(): ?string{
        return $this->lang_;
    }

    public function getLang(): ?string{
        return $this->lang;
    }

    public function setLang(?string $lang): void{
        $this->lang = $lang;
    }

    private function removeslash(?string $uri){

        if($uri[-1]==="/" && mb_strlen($uri)>1) {
            return substr($uri, 0, -1);
        }

        return $uri;
    }
    
    
    private function checkedUrlExists(array $routesapp = []){

        foreach($routesapp as $routesmodules){
            foreach($routesmodules as $routesItems){
                foreach($routesItems as $route){

            if (\preg_match("`^" . $route["uri"] . "$`", $this->request->getUri(), $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                return Create::factory(Route::class, [$route["name"], $route["callable"], $params]);
            }

        }
    }
    }

        return null;

    }

    private function next(){
        $this->index++;
    }

    private function parseUrl(?string $url)
    {
        $etape1 = \preg_replace('/([a-zA-Z0-9_-]+):([^\/]+)/', '(?P<${1}>${2})', $url);
      return $etape1;
    }


}