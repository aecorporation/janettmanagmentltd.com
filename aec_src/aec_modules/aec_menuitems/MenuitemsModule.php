<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_menuitems;

// classes importées

use aeCorp\aec_src\aec_modules\aec_menuitems\aec_controls\MenuitemsAdminControl;
use aeCorp\aec_src\aec_modules\aec_menuitems\aec_controls\MenuitemsAdminPostControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class MenuitemsModule extends ModulesAbstract
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
        $this->router->get($this->container->get("admin.prefix")."/menuitems/action:gestion", MenuitemsAdminControl::class, ["name"=>"admin.menuitems.gestion", "icon"=>"fa fa-image", "title"=>"Gestion des items", "description"=>"Menu de gestion des items"]);          
        $this->router->get($this->container->get("admin.prefix")."/menuitems/gestion/action:save", MenuitemsAdminControl::class, ["name"=>"admin.menuitems.gestion.save", "icon"=>"fa fa-image", "title"=>"Enregistrer des items", "description"=>"Menu d'enregistrer des items"]);          
        $this->router->get($this->container->get("admin.prefix")."/menuitems/gestion/action:edit/code:([a-zA-Z0-9_-]*)", MenuitemsAdminControl::class, ["name"=>"admin.menuitems.gestion.edit", "icon"=>"fa fa-save", "title"=>"Editer un fichie", "description"=>"Editer un fichier"]);          
        
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/save/action:savemenuitems", MenuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.save.post.savemenuitems", "icon"=>"fa fa-save", "title"=>"Enregistrer des items", "description"=>"Enregistrer des items"]);          
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/edit/action:updatemenuitems", menuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.edit.post.updatemenuitems", "icon"=>"fa fa-save", "title"=>"Modifier un fichie", "description"=>"Modifier un fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/edit/action:deletemenuitems/code:([A-Za-z0-9-_]*)", menuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.edit.post.deletemenuitems", "icon"=>"fa fa-save", "title"=>"Supprimer un fichie", "description"=>"Supprimer un item"]);          
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/action:searchmenuitems", MenuitemsAdminControl::class, ["name"=>"admin.menuitems.gestion.post.searchmenuitems", "icon"=>"fa fa-search", "title"=>"Rechercher des items", "description"=>"Rechercher des items"]);          



        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/save/action:savechildrenmenuitems", MenuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.save.post.savechildrenmenuitems", "icon"=>"fa fa-save", "title"=>"Enregistrer des images pour items", "description"=>"Enregistrer des images pour items"]);          
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/edit/action:updatechildrenmenuitems", menuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.edit.post.updatechildrenmenuitems", "icon"=>"fa fa-save", "title"=>"Modifier des images pour items", "description"=>"Modifier des images pour items"]);          
        $this->router->post($this->container->get("admin.prefix")."/menuitems/gestion/edit/action:deletechildrenmenuitems/code:([A-Za-z0-9-_]*)", menuitemsAdminPostControl::class, ["name"=>"admin.menuitems.gestion.edit.post.deletechildrenmenuitems", "icon"=>"fa fa-save", "title"=>"Supprimer des images pour items", "description"=>"Supprimer des images pour items"]);          
        
    }

}