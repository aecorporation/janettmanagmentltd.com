<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_checkerrors\CsrfException;
use aeCorp\aec_utils\aec_checkerrors\Error;
use aeCorp\aec_utils\aec_checkerrors\LengthDataException;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_session\SessionInterface;

class LengthDataMiddleware implements MiddlewareInterface
{

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
        if ($request->getMethod() !== "GET") {

            $errors = error_get_last();

            if($errors !==null && strpos($errors['message'], 'POST Content-Length of') === 0){

                if ((int)$request->getContentLength() > ((int) ini_get('post_max_size') * 1024 * 1024)) {

                    $this->stop(ini_get('upload_max_filesize'));

                }


            }else{
                return $middleware->process($request, $middleware);
            }
         
          
        } else {
            return $middleware->process($request, $middleware);
        }
    }

    private function stop(string $size)
    {
        throw new LengthDataException((string) Create::factory(Error::class, ["Fichier", "maxLengthData", [$size] ]), 1);
    }


}
