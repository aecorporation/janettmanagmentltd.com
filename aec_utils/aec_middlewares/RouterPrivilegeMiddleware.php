<?php

namespace aeCorp\aec_utils\aec_middlewares;

use aeCorp\aec_utils\aec_checkerrors\Error;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_router\RouterInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;
use aeCorp\aec_utils\aec_router\Route;

class RouterPrivilegeMiddleware implements MiddlewareInterface
{
    private $router = null;

    public function __construct(RouterInterface $router) {
        $this->router= $router;
    }

    /**
     * verifie si la requete renseignée par le client est une route valide
     * 
     *
     * @param RequestInterface $request
     * @param MiddlewareInterface $middleware
     * @return void
     */
    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {

        /**
         * Si route est introuvable pas la peine de poursuivre
         */
        if(is_null($request->getParam(Route::class))){
            return $middleware->process($request, $middleware);
        }
        /**
         * Trouver Menus et actions autorisés
         *  */
        $user = $request->getParam("user");

        $menusActionsAuthorised = [];

        if(isset($user)){

            $t1 = [...json_decode($user->getPrivilege_useradmin()->getMenus_privilege()),...json_decode($user->getPrivilege_useradmin()->getActions_privilege())];

            $t2 = [...json_decode($user->getMenusForbiden_useradmin() ?? "[]"),...json_decode($user->getActionsForbiden_useradmin() ?? "[]")];

            $t3 = [...json_decode($user->getMenusAuthorised_useradmin() ?? "[]"),...json_decode($user->getActionsAuthorised_useradmin() ?? "[]")];
            
            $menusActionsAuthorised = [...array_diff($t1,$t2), ... $t3 ];

        }

        /**
         * Passer cela a la request pour l'avoir partout
         */
        $request->setParams(["userPrivileges"=>$menusActionsAuthorised]);

        if(empty($request->getParam("userPrivileges"))){
            return $middleware->process($request, $middleware);
        }
        if(in_array($request->getParam(Route::class)->getName(), $request->getParam("userPrivileges"))){
            return $middleware->process($request, $middleware);
        }


        throw new PrivilegeException((string)Create::factory(Error::class, ["noAccess", "noAccess"]), 1);
    }
}