<?php

namespace aeCorp\aec_utils\aec_request;



interface RequestInterface{

    public function formData(): ?array;
    /**
     * Get the value of scriptName
     */
    public function getScriptName(): ?string;

    /**
     * Set the value of scriptName
     *
     * @return  RequestInterface
     */
    public function setScriptName(?string $scriptName): RequestInterface;

    /**
     * Get the value of scriptFile
     */
    public function getScriptFile(): ?string;

    /**
     * Set the value of scriptFile
     *
     * @return  RequestInterface
     */
    public function setScriptFile(?string $scriptFile): RequestInterface;

    /**
     * Get the value of documentRoot
     */
    public function getDocumentRoot(): ?string;

    /**
     * Set the value of documentRoot
     *
     * @return  RequestInterface
     */
    public function setDocumentRoot(? string $documentRoot):RequestInterface;

    /**
     * Get the value of encoding
     */
    public function getEncoding(): ?string;

    /**
     * Set the value of encoding
     *
     * @return  RequestInterface
     */
    public function setEncoding(?string $encoding):RequestInterface;

    /**
     * Get the value of httpAccept
     */
    public function getHttpAccept(): ?string;

    /**
     * Set the value of httpAccept
     *
     * @return  RequestInterface
     */
    public function setHttpAccept(?string $httpAccept): RequestInterface;

    /**
     * Get the value of langue
     */
    public function getLangue(): ?string;

    /**
     * Set the value of langue
     *
     * @return  RequestInterface
     */
    public function setLangue(?string $langue): RequestInterface;

    /**
     * Get the value of scheme
     */
    public function getScheme(): ?string;

    /**
     * Set the value of scheme
     *
     * @return  RequestInterface
     */
    public function setScheme(?string $scheme) : RequestInterface;

    /**
     * Get the value of protocol
     */
    public function getProtocol(): ?string;

    /**
     * Set the value of protocol
     *
     * @return  RequestInterface
     */
    public function setProtocol(?string $protocol) : RequestInterface;

    /**
     * Get the value of method
     */
    public function getMethod(): ?string;

    /**
     * Set the value of method
     *
     * @return  RequestInterface
     */
    public function setMethod(?string $method) : RequestInterface;

    /**
     * Get the value of query
     */
    public function getQuery(): ?string;

    /**
     * Set the value of query
     *
     * @return  RequestInterface
     */
    public function setQuery(?string $query) : RequestInterface;

    /**
     * Get the value of uri
     */
    public function getUri(): ?string;

    /**
     * Set the value of uri
     *
     * @return  RequestInterface
     */
    public function setUri(?string $uri) : RequestInterface;

    /**
     * Get the value of host
     */
    public function getHost(): ?string;

    /**
     * Set the value of host
     *
     * @return  RequestInterface
     */
    public function setHost(?string $host) : RequestInterface;

    /**
     * Get the value of serverName
     */
    public function getServerName(): ?string;

    /**
     * Set the value of serverName
     *
     * @return  RequestInterface
     */
    public function setServerName(?string $serverName):RequestInterface;

    /**
     * Get the value of ip
     */
    public function getIp(): ?string;

    /**
     * Set the value of ip
     *
     * @return  RequestInterface
     */
    public function setIp(?string $ip) : RequestInterface;

    /**
     * Get the value of port
     */
    public function getPort(): ?string;

    /**
     * Set the value of port
     *
     * @return  RequestInterface
     */
    public function setPort(?string $port) : RequestInterface;

   
    /**
     * Get the value of params
     */
    public function getAllParams(): array;

    /**
     * Set the value of params
     *
     * @return  RequestInterface
     */
    public function setParams(array $params = []): RequestInterface;

    
    /**
     * Set the value of params
     *
     * @return  RequestInterface
     */
    public function getParam(?string $key);

    
    /**
     * Set the value of params
     *
     * @return  RequestInterface
     */
    public function hasParam(?string $key): bool;
}