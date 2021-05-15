<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_blog;

// classes importées

use aeCorp\aec_src\aec_modules\aec_blog\aec_controls\BlogAdminControl;
use aeCorp\aec_src\aec_modules\aec_blog\aec_controls\BlogAdminPostControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class blogModule extends ModulesAbstract
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
        $this->router->get($this->container->get("admin.prefix")."/blog/action:gestion", BlogAdminControl::class, ["name"=>"admin.blog.gestion", "icon"=>"fa fa-image", "title"=>"Gestion des fichiers", "description"=>"Menu de gestion des fichiers"]);          
        $this->router->get($this->container->get("admin.prefix")."/blog/gestion/action:save", BlogAdminControl::class, ["name"=>"admin.blog.gestion.save", "icon"=>"fa fa-image", "title"=>"Enregistrer des fichiers", "description"=>"Menu d'enregistrer des fichiers"]);          
        $this->router->get($this->container->get("admin.prefix")."/blog/gestion/action:edit/code:([a-zA-Z0-9_-]*)", BlogAdminControl::class, ["name"=>"admin.blog.gestion.edit", "icon"=>"fa fa-save", "title"=>"Editer un fichie", "description"=>"Editer un fichier"]);          
        
        $this->router->post($this->container->get("admin.prefix")."/blog/gestion/save/action:saveblog", BlogAdminPostControl::class, ["name"=>"admin.blog.gestion.save.post.saveblog", "icon"=>"fa fa-save", "title"=>"Enregistrer des images", "description"=>"Action d'enreistrer une fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/blog/gestion/edit/action:updateblog", BlogAdminPostControl::class, ["name"=>"admin.blog.gestion.edit.post.updateblog", "icon"=>"fa fa-save", "title"=>"Modifier un fichie", "description"=>"Modifier un fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/blog/gestion/edit/action:deleteblog/code:([A-Za-z0-9-_]*)", BlogAdminPostControl::class, ["name"=>"admin.blog.gestion.edit.post.deleteblog", "icon"=>"fa fa-save", "title"=>"Supprimer un fichie", "description"=>"Supprimer un fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/blog/gestion/action:searchblog", BlogAdminControl::class, ["name"=>"admin.blog.gestion.post.searchblog", "icon"=>"fa fa-search", "title"=>"Rechercher des fichiers", "description"=>"Rechercher des fichiers"]);          

    }

}