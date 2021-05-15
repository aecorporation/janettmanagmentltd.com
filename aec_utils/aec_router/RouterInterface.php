<?php

namespace aeCorp\aec_utils\aec_router;

use aeCorp\aec_utils\aec_request\RequestInterface;



interface RouterInterface{

    /**
     * add.
     *
     * @access	public
     * @param	string  	$path    	url passé par le client
     * @param	callable	$callback	/ string
     * @param	string  	$params    	[module, url name, description]
     * @return	void
     */
    public function get(string $path, $callback, array $params=[]) : RouterInterface;
    
    
    /**
     * add.
     *
     * @access	public
     * @param	string  	$path    	url passé par le client
     * @param	callable	$callback	/ string
     * @param	string  	$params    	[module, url name, description]
     * @return	void
     */
    public function post(string $path, $callback,  array $params=[]): RouterInterface;

    
    /**
     * add.
     *
     * @access	public
     * @param	string  	$path    	url passé par le client
     * @param	callable	$callback	/ string
     * @param	string  	$params    	[module, url name, description]
     * @return	void
     */
    public function put(string $path, $callback,  array $params=[]): RouterInterface;

    public function getRoutes() : array;
    public function getRoutesGets() : array;
    public function getRoutesPosts() : array;
    public function getRoutesPuts() : array;

    public function match(RequestInterface $request): ?RouteInterface;

    
    /**
     *
     * @access	public
     * @param	string  	$params tableau associatif pour definie les variable de url
     * @return	string
     */

    public function generateUri(string $name,  ?array $params=[]) : ?string;
}