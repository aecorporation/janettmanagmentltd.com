<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_serviceclient;

// classes importées

use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls\ServiceclientAdminControl;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls\ServiceclientAdminPostControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_controls\ServiceclientControl;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class ServiceclientModule extends ModulesAbstract
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

        $this->router->get("/serviceclient/action:contact", ServiceclientControl::class, ["name"=>"front.serviceclient.contact", "description"=>"Contact"]);
        $this->router->get("/serviceclient/action:faq", ServiceclientControl::class, ["name"=>"front.serviceclient.faq", "description"=>"Faq"]);
        $this->router->get("/serviceclient/action:cmd_livraison", ServiceclientControl::class, ["name"=>"front.serviceclient.cmd_livraison", "description"=>"Commande & Livraison"]);
        $this->router->get("/serviceclient/action:condition_retour_remboursement", ServiceclientControl::class, ["name"=>"front.serviceclient.condition_retour_remboursement", "description"=>"Condition de retour"]);
        
        $this->router->get($this->container->get("admin.prefix")."/serviceclient/action:gestion", ServiceclientAdminControl::class, ["name"=>"admin.serviceclient.gestion", "title"=>"Contact", "description"=>"Gestion du service client"]);
        $this->router->get($this->container->get("admin.prefix")."/serviceclient/action:gestion/page:([a-z_-]*)", ServiceclientAdminControl::class, ["name"=>"admin.serviceclient.gestion.page", "title"=>"Contact", "description"=>"Visualiser les contenus pour service client"]);
        $this->router->post($this->container->get("admin.prefix")."/serviceclient/gestion/action:updateServiceclient", ServiceclientAdminPostControl::class, ["name"=>"admin.serviceclient.gestion.post.updateServiceclient", "title"=>"Contact", "description"=>"Enregistrer ou modifier service client"]);
      
    }

}