<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\PrivilegeModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class PrivilegeGetControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules

        $this->model = $this->container->get(PrivilegeModel::class);
    }

/** La page de creation de privileges */
    public function executeCreatePrivilege(RequestInterface $request)
    {

        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION PRIVILEGES",
            "views"=>$this->renderer->render("useradmin.admin.gestion",[
                "title"=>'<i class="fa fa-list"></i> Liste des privileges',
                "element"=>$this->renderer->render("useradmin.admin.elementprivlege", [
                    "items_views"=>$this->renderer->render("useradmin.admin.createPrivilege", [
                        "optionAction"=>$request->getParam("action"),
                        "formCreatingPrivilege"=>$this->renderer->render("useradmin.admin.formCreatingPrivilege",[
                            "listeMenusActions"=>$this->getListMenusActionsViews($request)
                        ]),

                        "listPrivilegeCreated"=>$this->renderListPrivilege()
                    ])
                ])
            ])
        ], true));
    }


    /**
     * Visualiser un privilege
     */
    public function executeVisualiserPrivilege(RequestInterface $request){

        /**
         * Selection du privilege
         */
        $object = $this->model->find(["where"=>["code_privilege = '".$request->getParam("code")."'"]]);
        /**
         * Convertir ses menus en json 
         */
        $menus_privilege = json_decode( ($object !==null) ? $object->getMenus_privilege() : null);
        /**
        * Convertir ses actions en json 
         */
        $actions_privilege = json_decode( ($object !==null) ? $object->getActions_privilege() : null);
        /**
         * Rendre la vue au client
         */
        return Response::send(200, $this->renderer->render("useradmin.admin.visualiserprivilege",[
            "privilege"=>$object ?? null,
            "listeMenusActions"=>$this->getListMenusActionsViews($request, $menus_privilege, $actions_privilege)
        ])
        );
    }

/**
 * Liste des menus et actions
 */

    public function renderListPrivilege(){

        return $this->renderer->render("useradmin.admin.listPrivilegeCreated",[
            "tablePrivilege"=>$this->listTablePrivilege(),
            "formsearchprivilege"=>$this->formsearchprivilege(),
        ]);

    }

    public function listTablePrivilege(?array $data=null){

        $privileges = [];

        if(is_null($data)){
            $privileges = $this->model->findAll();

        }else{
            $privileges = $data;

        }

        return$this->renderer->render("useradmin.admin.tablePrivilege",[
            "nb"=>count($privileges ?? []),
            "privileges"=>$privileges,
        ]);


    }
/**
 * Le formulaire de recherche de privilege
 */
    public function formsearchprivilege(){

        return $this->renderer->render("useradmin.admin.formsearchprivilege",[
            "listPrivileges"=>$this->model->findAll()
        ]);

    }

    /**
     * tableau LIste menus et actions
     */

     
    public function getListMenusActionsViews(
    RequestInterface $request, 
    ?array $menus_privilege = [], 
    ?array $actions_privilege = [], 
    ?array $menusForbiden_useradmin = [],
    ?array $actionsForbiden_useradmin = [],
    ?array $menusAuthorised_useradmin = [],
    ?array $actionsAuthorised_useradmin = [],
    $user = null
    ){

      return  $this->renderer->render("useradmin.admin.listeMenusActions", [
            "optionAction"=>$request->getParam("action"),
            "user"=>$user,
            "menus_privilege"=>$menus_privilege,
            "actions_privilege"=>$actions_privilege,
            "menusForbiden_useradmin"=> $menusForbiden_useradmin,
            "actionsForbiden_useradmin"=> $actionsForbiden_useradmin,
            "menusAuthorised_useradmin"=> $menusAuthorised_useradmin,
            "actionsAuthorised_useradmin"=>$actionsAuthorised_useradmin
        ]);

    }

}