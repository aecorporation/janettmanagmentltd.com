<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_config;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use \aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_session\SessionInterface;

class RouterPrefixAdminMiddleware implements MiddlewareInterface
{
    private ?ContainerInterface $container=null;
    private ?string $prefix=null;
    private ?string $middleware=null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->prefix = $this->container->get("admin.prefix");
        $this->middleware = LoginAdminMiddleware::class;
    }

    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        if (strpos($request->getUri(), $this->prefix) === 0) 
        {

            return $this->container->get($this->middleware)->process($request, $middleware);

        }

        /**
         * Empecher l'utilisateur de retourner sur la page de connexion si deja connecté
         */
        if (strpos($request->getUri(), $this->container->get("login.admin")) === 0) {

            if(!is_null($this->container->get(SessionInterface::class)["aec_USER_ID_ADMIN_CONNECTED"])){

                return Response::redirect($this->container->get("admin.prefix"));
            }
            
         }
            return $middleware->process($request, $middleware);
    }

}