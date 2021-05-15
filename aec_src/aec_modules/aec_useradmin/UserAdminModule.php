<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_useradmin;

// classes importées

use aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls\PrivilegeGetControl;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls\PrivilegePostControl;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls\UseradminGetControl;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls\UseradminPostControl;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class UserAdminModule extends ModulesAbstract
{
    use ModuleTrait;

    // Definition si necessaire de fichier de configuration spécifique
    const DEFINITION = [__DIR__ . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php"];
    const MIGRATION = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_migrations";
    const SEED = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_seeds";
    
    // Definition des routes relatives au module de l'application
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        //useradmin
        $this->router->get($this->container->get("admin.prefix")."/useradmin/action:gestion", UseradminGetControl::class, ["name"=>"admin.administrateur.gestion", "title"=>"ADMINISTRATION", "icon"=>"fa fa-users", "description"=>"Lister et Enrégistrer administrateurs"]);
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/action:visualiseradmin/code:([0-9a-zA-Z]*)", UseradminGetControl::class, ["name"=>"admin.administrateur.visualiseradmin", "icon"=>"fa fa-eye","title"=>"Visualiser le privilege administrateur", "description"=>"Visualiser le privilege administrateur"]);
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/action:profiladmin/code:([0-9a-zA-Z]*)", UseradminGetControl::class, ["name"=>"admin.administrateur.profiladmin", "icon"=>"fa fa-eye","title"=>"Visualiser le profil administrateur", "description"=>"Visualiser le profil administrateur"]);
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/action:actualiserUseradmin", UseradminGetControl::class, ["name"=>"admin.administrateur.actualiserUseradmin", "title"=>"Actualiser liste de privileges", "description"=>"Actualiser liste de privileges"]);
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/action:saveUseradmin", UseradminGetControl::class, ["name"=>"admin.administrateur.saveUseradmin", "title"=>"Enregistrer administrateur", "description"=>"Enregistrer administrateur"]);

        //Actions
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:saveUseradmin", UseradminPostControl::class, ["name"=>"admin.administrateur.gestion.post.saveUseradmin", "description"=>"Enregistrer un adminstrateur"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:searchUseradmin", UseradminPostControl::class, ["name"=>"admin.administrateur.gestion.post.searchUseradmin", "description"=>"Rechercher un administateur"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:updateUseradmin", UseradminPostControl::class, ["name"=>"admin.administrateur.gestion.post.updateUseradmin", "description"=>"Modifier un administrateur"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:deleteUseradmin", UseradminPostControl::class, ["name"=>"admin.administrateur.gestion.post.deleteUseradmin", "description"=>"Suprimer un administrateur"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:disconnectUseradmin", UseradminPostControl::class, ["name"=>"admin.administrateur.gestion.post.disconnectUseradmin", "description"=>"Se déconnecter du panel"]);

        //Privilege
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/action:createPrivilege", PrivilegeGetControl::class, ["name"=>"admin.administrateur.createPrivilege", "title"=>"Creer privilege", "description"=>"Gestion de privileges"]);
        $this->router->get($this->container->get("admin.prefix")."/useradmin/gestion/createPrivilege/action:visualiserPrivilege/code:([a-zA-Z0-9]*)", PrivilegeGetControl::class, ["name"=>"admin.administrateur.createPrivilege.visualiserPrivilege", "title"=>"Visualiser un privilege", "description"=>"Visualiser un privilege"]);
        //Actions
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:savePrivilege", PrivilegePostControl::class, ["name"=>"admin.administrateur.createPrivilege.post.savePrivilege", "description"=>"Enregistrer un privilege"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:searchPrivilege", PrivilegePostControl::class, ["name"=>"admin.administrateur.createPrivilege.post.searchPrivilege", "description"=>"Rechercher un privilege"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:updatePrivilege", PrivilegePostControl::class, ["name"=>"admin.administrateur.createPrivilege.post.updatePrivilege", "description"=>"Modifier un privilege"]);
        $this->router->post($this->container->get("admin.prefix")."/useradmin/gestion/action:deletePrivilege", PrivilegePostControl::class, ["name"=>"admin.administrateur.createPrivilege.post.deletePrivilege", "description"=>"Suprimer un privilege"]);

    }

}
