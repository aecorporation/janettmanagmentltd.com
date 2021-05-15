<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_accueil;

// classes importées

use aeCorp\aec_src\aec_modules\aec_accueil\aec_controls\AccueilAdminControl;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\aec_accueil\aec_controls\AccueilControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class AccueilModule extends ModulesAbstract
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
        $this->router->get("/", AccueilControl::class, ["name"=>"front.accueil.index", "icon"=>"fa fa-home", "description"=>"QUI SOMMES-NOUS ?"]);
        $this->router->get("/mission_et_vision", AccueilControl::class, ["name"=>"front.accueil.mission_et_vision", "icon"=>"fa fa-home", "description"=>"MISSION & VISION"]);
        $this->router->get("/nos_services", AccueilControl::class, ["name"=>"front.accueil.nos_services", "icon"=>"fa fa-home", "description"=>"NOS SERVICES"]);
        $this->router->get("/nos_contacts", AccueilControl::class, ["name"=>"front.accueil.nos_contacts", "icon"=>"fa fa-home", "description"=>"NOS CONTACTS"]);
        $this->router->get("/nos_contacts/envoi_message", AccueilControl::class, ["name"=>"front.accueil.nos_contacts.envoi_message", "icon"=>"fa fa-home", "description"=>"ENVOI DE MESSAGE"]);
        
        $this->router->get($this->container->get("admin.prefix")."/site/action:slide", AccueilAdminControl::class, ["name"=>"admin.site.slide", "icon"=>"fa fa-image", "title"=>"Slide show", "description"=>"Slide-show"]);

    }

}
