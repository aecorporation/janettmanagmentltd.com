<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_checkerrors\CsrfException;
use aeCorp\aec_utils\aec_checkerrors\Error;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_session\SessionInterface;

class CsrfMiddleware implements MiddlewareInterface{

    private $index = "csrf";
    private $sessionIndex = "_csrf";
    private $session;
    private $limit=50;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        /* Si la requete du client est un GET pas besoin de verifier si une clé CSRF 
            Mais Si la methode de la requete est POST, DELETE ou PUT on verifie il y a une clé 
            CSRF qui provient du site
        */
        if($request->getMethod()!=="GET")
        {
            if (!array_key_exists($this->index, $request->getAllParams())) {
                echo var_dump($request->getAllParams());
                $this->reject();
            } else {

                $crsfList = $this->session[$this->sessionIndex] ?? [];

                if (in_array($request->getParam($this->index), $crsfList)) {
                    //$this->useToken($request->getParam($this->index));
                    return $middleware->process($request, $middleware);

                } else {
                    echo 1;
                    $this->reject();
                }
            }
        } else {
            return $middleware->process($request, $middleware);
        }
       

        
    }

    public function generateToken() : string {
        $token= md5(bin2hex("aeCorp@@225_147859641#qqwwwe".random_bytes(16)));
        $crsfList = $this->session[$this->sessionIndex]??[];
        $crsfList[]= $token;
         $this->session[$this->sessionIndex] = $crsfList;
         $this->limiteTokens();
         return $token;
    }

    private function useToken(string $token) : void{
       $tockens = array_filter($this->session[$this->sessionIndex], function($tok) use($token) {
            return $tok !==$token;
       });
        $this->session[$this->sessionIndex] = $tockens;

    }

    private function limiteTokens()
    {
        $crsfList =  $this->session[$this->sessionIndex] ?? [];

        if(count($crsfList)>$this->limit)
        {
            array_shift($crsfList);
        }
         $this->session[$this->sessionIndex] = $crsfList;
       
    }

    private function reject()
    {
        throw new CsrfException((string) Create::factory(Error::class, ["crsfNoExist", "crsfNoExist"]), 1);
    }


    /**
     * Get the value of index
     */ 
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set the value of index
     *
     * @return  self
     */ 
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Get the value of sessionIndex
     */ 
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }

    /**
     * Set the value of sessionIndex
     *
     * @return  self
     */ 
    public function setSessionIndex($sessionIndex)
    {
        $this->sessionIndex = $sessionIndex;

        return $this;
    }
}