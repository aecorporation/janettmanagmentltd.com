<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_Imagevideopub;

// classes importées

use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_controls\ImagevideopubAdminControl;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_controls\ImagevideopubAdminPostControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class ImagevideopubModule extends ModulesAbstract
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
        $this->router->get($this->container->get("admin.prefix")."/imagevideopub/action:gestion", ImagevideopubAdminControl::class, ["name"=>"admin.imagevideopub.gestion", "icon"=>"fa fa-image", "title"=>"Gestion des fichiers", "description"=>"Menu de gestion des fichiers"]);          
        $this->router->get($this->container->get("admin.prefix")."/imagevideopub/gestion/action:save", ImagevideopubAdminControl::class, ["name"=>"admin.imagevideopub.gestion.save", "icon"=>"fa fa-image", "title"=>"Enregistrer des fichiers", "description"=>"Menu d'enregistrer des fichiers"]);          
        $this->router->get($this->container->get("admin.prefix")."/imagevideopub/gestion/action:edit/code:([a-zA-Z0-9_-]*)", ImagevideopubAdminControl::class, ["name"=>"admin.imagevideopub.gestion.edit", "icon"=>"fa fa-save", "title"=>"Editer un fichie", "description"=>"Editer un fichier"]);          
        
        $this->router->post($this->container->get("admin.prefix")."/imagevideopub/gestion/save/action:saveImagevideopub", ImagevideopubAdminPostControl::class, ["name"=>"admin.imagevideopub.gestion.save.post.saveImagevideopub", "icon"=>"fa fa-save", "title"=>"Enregistrer des images", "description"=>"Action d'enreistrer une fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/imagevideopub/gestion/edit/action:updateImagevideopub", ImagevideopubAdminPostControl::class, ["name"=>"admin.imagevideopub.gestion.edit.post.updateImagevideopub", "icon"=>"fa fa-save", "title"=>"Modifier un fichie", "description"=>"Modifier un fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/imagevideopub/gestion/edit/action:deleteImagevideopub/code:([A-Za-z0-9-_]*)", ImagevideopubAdminPostControl::class, ["name"=>"admin.imagevideopub.gestion.edit.post.deleteImagevideopub", "icon"=>"fa fa-save", "title"=>"Supprimer un fichie", "description"=>"Supprimer un fichier"]);          
        $this->router->post($this->container->get("admin.prefix")."/imagevideopub/gestion/action:searchImagevideopub", ImagevideopubAdminControl::class, ["name"=>"admin.imagevideopub.gestion.post.searchImagevideopub", "icon"=>"fa fa-search", "title"=>"Rechercher des fichiers", "description"=>"Rechercher des fichiers"]);          

    }

}