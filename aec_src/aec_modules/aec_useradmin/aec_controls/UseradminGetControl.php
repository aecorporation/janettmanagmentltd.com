<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\PrivilegeModel;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\UseradminModel;
use aeCorp\aec_utils\aec_countries\Countries;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class UseradminGetControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules

        $this->model = $this->container->get(UseradminModel::class);
    }

    public function executeGestion(RequestInterface $request)
    {
        $users = $this->model->findAll();

        $tabs = array_map(function($item){

            return ["pays_useradmin"=>$item->getPays_useradmin(), "ville_useradmin"=>$item->getVille_useradmin()];

        }, $users->getHydrated());
        
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION ADMINISTRATEUR",
            "views"=>$this->renderer->render("useradmin.admin.gestion",[
                "title"=>'<i class="fa fa-list"></i> Liste des membres',
                "element"=>$this->renderer->render("useradmin.admin.elementadmin", [
                    "items_views"=>$this->renderer->render("useradmin.admin.list_useradmin", [
                        "tabs"=> $tabs ?? [],
                        "tableUseradmin"=>$this->getTableUseradmin(),
                            "save_useradmin"=>$this->renderer->render("useradmin.admin.save_useradmin", [
                                "optionAction"=>$request->getParam("action"),
                                "countries"=> Countries::list(),
                                "privileges"=>$this->container->get(PrivilegeModel::class)->findAll()
                            ])
                    ])
                ])
            ])
        ], true));
    }


    public function executeSaveUseradmin(RequestInterface $request)
    {
        $users = $this->model->findAll();

        $tabs = array_map(function($item){

            return ["pays_useradmin"=>$item->getPays_useradmin(), "ville_useradmin"=>$item->getVille_useradmin()];

        }, $users->getHydrated());
        
        return Response::send(200, $this->renderer->render("admin.index",[
            "titleOfcomponent"=> "GESTION ADMINISTRATEUR",
            "views"=>$this->renderer->render("useradmin.admin.gestion",[
                "title"=>'<i class="fa fa-save"></i> Enregistrer un membre',
                "element"=>$this->renderer->render("useradmin.admin.elementadmin", [
                    "items_views"=>$this->renderer->render("useradmin.admin.save_useradmin", [
                                "optionAction"=>$request->getParam("action"),
                                "countries"=> Countries::list(),
                                "privileges"=>$this->container->get(PrivilegeModel::class)->findAll()
                    ])
                ])
            ])
        ], true));
    }



    public function getTableUseradmin($data =null){

        $users = $data ?? $this->model->findAll();

        return $this->renderer->render("useradmin.admin.tableUseradmin", [
            "nb"=> count($users),
            "users"=> $users
        ]);
    }

    public function executeVisualiseradmin(RequestInterface $request)
    {
        $code = $request->getParam("code") ?? null;

            $user = $this->model->find(["where"=>["code_useradmin = '$code'"]]);

            if($user!==null){
            /**
             * Selection du privilege
             */
            $privilege = $this->container->get(PrivilegeModel::class)->find(["where"=>["code_privilege = '".$user->getCodePrivilege_useradmin()."'"]]);
            /**
             * Convertir ses menus en json pour le js
             */
            $menus_privilege = json_decode( ($privilege !==null) ? $privilege->getMenus_privilege() : null);

            $actions_privilege = json_decode( ($privilege !==null) ? $privilege->getActions_privilege() : null);

            $menusForbiden_useradmin = json_decode( ($user !==null) ? $user->getMenusForbiden_useradmin() : null);
            $actionsForbiden_useradmin = json_decode( ($user !==null) ? $user->getActionsForbiden_useradmin() : null);
            $menusAuthorised_useradmin = json_decode( ($user !==null) ? $user->getMenusAuthorised_useradmin() : null);
            $actionsAuthorised_useradmin = json_decode( ($user !==null) ? $user->getActionsAuthorised_useradmin() : null);

            }

            return Response::send(200, $this->renderer->render("admin.index",[
                "titleOfcomponent"=> "GESTION ADMINISTRATEUR",
                "views"=>$this->renderer->render("useradmin.admin.gestion",[
                    "title"=>'<i class="fa fa-save"></i> Details d\'un membre',
                    "element"=>$this->renderer->render("useradmin.admin.elementadmin", [
                        "items_views"=>$this->renderer->render("useradmin.admin.save_useradmin", [
                            "optionAction"=>$request->getParam("action"),
                            "user"=>$user ?? null,
                            "countries"=> Countries::list(),
                            "privileges"=>$this->container->get(PrivilegeModel::class)->findAll(),
                            "listeMenusActions"=>$this->container->get(PrivilegeGetControl::class)
                                                ->getListMenusActionsViews(
                                                $request, 
                                                $menus_privilege ?? [], 
                                                $actions_privilege ?? [], 
                                                $menusForbiden_useradmin ?? [], 
                                                $actionsForbiden_useradmin ?? [], 
                                                $menusAuthorised_useradmin ?? [], 
                                                $actionsAuthorised_useradmin ?? [],
                                                $user
                                                )
                        ])
                    ])
                ])
            ], true));

    }

    public function executeProfiladmin(RequestInterface $request){

        $this->executeVisualiseradmin($request);
    }


}
