<?php

namespace aeCorp\aec_utils\aec_request;

/**
 * Represente toutes les requetes du client de l'application.
 *
 * @author	aeCorporation
 * @author	Unknown
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre  2019.	
 * @version	v1.0.1	Saturday, December 14th, 2019.
 * @global
 */
class Request implements RequestInterface{

    /**
     * @var		mixed	$scriptName
     */
    private ?string $scriptName=NULL;
    /**
     * @var		mixed	$scriptFile
     */
    private ?string $scriptFile=NULL;
    /**
     * @var		mixed	$documentRoot
     */
    private ?string $documentRoot=NULL;
    /**
     * @var		mixed	$encoding
     */
    private ?string $encoding=NULL;
    /**
     * @var		mixed	$httpAccept
     */
    private ?string $httpAccept=NULL;
    /**
     * @var		mixed	$langue
     */
    private ?string $langue=NULL;
    /**
     * @var		mixed	$scheme
     */
    private ?string $scheme=NULL;
    /**
     * @var		mixed	$protocol
     */
    private ?string $protocol=NULL;
    /**
     * @var		mixed	$method
     */
    private ?string $method=NULL;
    /**
     * @var		mixed	$query
     */
    private ?string $query=NULL;
    /**
     * @var		mixed	$uri
     */
    private ?string $uri=NULL;
    /**
     * @var		string	$host
     */
    private ?string $host = NULL;
    /**
     * @var		string	$serverName
     */
    private ?string $serverName = NULL;
    /**
     * @var		string	$ip
     */
    private ?string $ip = NULL;
    /**
     * @var		string	$port
     */
    private ?string $port = NULL;

    /**
     * @var		array	$param
     */
    private ?array $params=[];

    /**
     * @var		string $http_requete_with la requete http
     */
    private ?string $http_requete_with = NULL;


    /**
     * @var		string $content_lenght le taille de données transmises par le client
     */
    private ?string $content_lenght = NULL;

    /**
     * __construct.
     *
     * @author	aeCorporation
     * @since	v0.0.1
     * @version	v1.0.0	Saturday, December 14th, 2019.
     * @access	public
     * @return	void
     */
    public function __construct(){
        $this->params = array_merge($this->params, $_REQUEST);
    }

    /**
     * Initialiser la variable global $_SERVER.
     * @access	public
     * @return	void
     */
    public function initServer() : void
    {
        /**
         * Initialisation de toutes les variables
         * a partir de la requete
         */

        $this->setHttp_requete_with($_SERVER["HTTP_X_REQUESTED_WITH"] ?? NULL);
        $this->setScriptName($_SERVER["SCRIPT_NAME"]?? NULL);
        $this->setScriptFile($_SERVER["SCRIPT_FILENAME"]?? NULL);
        $this->setDocumentRoot($_SERVER["DOCUMENT_ROOT"] ?? NULL);
        $this->setEncoding($_SERVER["HTTP_ACCEPT_ENCODING"] ?? NULL);
        $this->setHttpAccept($_SERVER["HTTP_ACCEPT"] ?? NULL);
        $this->setLangue($_SERVER["HTTP_ACCEPT_LANGUAGE"] ?? NULL);
        $this->setScheme($_SERVER["REQUEST_SCHEME"]??NULL);
        $this->setProtocol($_SERVER["SERVER_PROTOCOL"] ?? NULL);
        $this->setMethod($_SERVER["REQUEST_METHOD"] ?? NULL);
        $this->setUri($_SERVER["REQUEST_URI"] ?? NULL);
        $this->setHost($_SERVER["HTTP_HOST"] ?? NULL);
        $this->setServerName($_SERVER["SERVER_NAME"] ?? NULL);
        $this->setIp($_SERVER["REMOTE_ADDR"] ?? NULL);
        $this->setPort($_SERVER["SERVER_PORT"] ?? NULL);
    }

    public function formData() : ?array
    {
        return array_merge($_GET, $_POST, $_FILES);
    }
    /**
     * Get the value of http_requete_with
     */ 
    public function getContentLength() : ?string
    {
        $this->setContentLength();
        return $this->content_lenght;
    }

    /**
     * Set the value of http_requete_with
     *
     * @return  self
     */ 
    public function setContentLength() : RequestInterface
    {
        $this->content_lenght = $_SERVER["CONTENT_LENGTH"];

        return $this;
    }


    /**
     * Get the value of http_requete_with
     */
    public function getHttp_requete_with():?string
    {
        return $this->http_requete_with;
    }

    /**
     * Set the value of http_requete_with
     *
     * @return  self
     */
    public function setHttp_requete_with(?string $http_requete_with) : RequestInterface
    {
        $this->http_requete_with = $http_requete_with;

        return $this;
    }

    /**
     * Get the value of scriptName
     */
    public function getScriptName():?string
    {
        return $this->scriptName;
    }

    /**
     * Set the value of scriptName
     *
     * @return  self
     */
    public function setScriptName(?string $scriptName):RequestInterface
    {
        $this->scriptName = $scriptName;

        return $this;
    }

    /**
     * Get the value of scriptFile
     */ 
    public function getScriptFile() : ?string
    {
        return $this->scriptFile;
    }

    /**
     * Set the value of scriptFile
     *
     * @return  self
     */ 
    public function setScriptFile(?string $scriptFile) :RequestInterface
    {
        $this->scriptFile = $scriptFile;

        return $this;
    }

    /**
     * Get the value of documentRoot
     */ 
    public function getDocumentRoot():? string
    {
        return $this->documentRoot;
    }

    /**
     * Set the value of documentRoot
     *
     * @return  self
     */ 
    public function setDocumentRoot(?string $documentRoot): RequestInterface
    {
        $this->documentRoot = $documentRoot;

        return $this;
    }

    /**
     * Get the value of encoding
     */ 
    public function getEncoding():?string
    {
        return $this->encoding;
    }

    /**
     * Set the value of encoding
     *
     * @return  self
     */ 
    public function setEncoding(?string $encoding):RequestInterface
    {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * Get the value of httpAccept
     */ 
    public function getHttpAccept(): ?string
    {
        return $this->httpAccept;
    }

    /**
     * Set the value of httpAccept
     *
     * @return  self
     */ 
    public function setHttpAccept(?string $httpAccept) :RequestInterface
    {
        $this->httpAccept = $httpAccept;

        return $this;
    }

    /**
     * Get the value of langue
     */ 
    public function getLangue(): ?string
    {
        return $this->langue;
    }

    /**
     * Set the value of langue
     *
     * @return  self
     */ 
    public function setLangue(?string $langue):RequestInterface
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get the value of scheme
     */ 
    public function getScheme():?string
    {
        return $this->scheme;
    }

    /**
     * Set the value of scheme
     *
     * @return  self
     */ 
    public function setScheme(?string $scheme):RequestInterface
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * Get the value of protocol
     */ 
    public function getProtocol():?string
    {
        return $this->protocol;
    }

    /**
     * Set the value of protocol
     *
     * @return  self
     */ 
    public function setProtocol(?string $protocol):RequestInterface
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod():?string
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    public function setMethod(?string $method): RequestInterface
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the value of query
     */
    public function getQuery():?string
    {
        return $this->query;
    }

    /**
     * Set the value of query
     *
     * @return  self
     */
    public function setQuery(?string $query):RequestInterface
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get the value of uri
     */ 
    public function getUri():?string
    {
        return $this->uri;
    }

    /**
     * Set the value of uri
     *
     * @return  self
     */ 
    public function setUri(?string $uri):RequestInterface
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get the value of host
     */ 
    public function getHost():?string
    {
        return $this->host;
    }

    /**
     * Set the value of host
     *
     * @return  self
     */ 
    public function setHost(?string $host):RequestInterface
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get the value of serverName
     */ 
    public function getServerName():?string
    {
        return $this->serverName;
    }

    /**
     * Set the value of serverName
     *
     * @return  self
     */ 
    public function setServerName(?string $serverName):RequestInterface
    {
        $this->serverName = $serverName;

        return $this;
    }

    /**
     * Get the value of ip
     */ 
    public function getIp():?string
    {
        return $this->ip;
    }

    /**
     * Set the value of ip
     *
     * @return  self
     */ 
    public function setIp(?string $ip):RequestInterface
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get the value of port
     */ 
    public function getPort():?string
    {
        return $this->port;
    }

    /**
     * Set the value of port
     *
     * @return  self
     */ 
    public function setPort(?string $port):RequestInterface
    {
        $this->port = $port;

        return $this;
    }

   

    /**
     * Get the value of params
     */ 
    public function getAllParams() : array
    {
        return $this->params;
    }

    public function getParam(?string $key)
    {
        if(array_key_exists($key, $this->params))
        {
            return $this->params[$key];
        }
       
    }

    public function hasParam(?string $key) : bool
    {
        if(array_key_exists($key, $this->params))
        {
            return true;
        }

        return false;
       
    }


    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams(array $params=[]) : RequestInterface
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }
}