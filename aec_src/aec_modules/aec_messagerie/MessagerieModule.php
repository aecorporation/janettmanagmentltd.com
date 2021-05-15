<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_messagerie;

// classes importées
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls\MessagerieAdminControl;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls\MessagerieAdminPostControl;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls\MessagerieControl;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class MessagerieModule extends ModulesAbstract
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
        //MESSAGE

        $this->router->post("/messagerie/action:sendMessage", MessagerieControl::class, ["name"=>"front.messagerie.sendMessage", "description"=>"Envoie de message"]);

        
        $this->router->get($this->container->get("admin.prefix")."/messagerie", MessagerieAdminControl::class, ["name"=>"admin.messagerie.index", "description"=>"Boite de reception"]);
        $this->router->get($this->container->get("admin.prefix")."/messagerie/action:visualiser/id:([0-9]*)", MessagerieAdminControl::class, ["name"=>"admin.messagerie.visualiser", "description"=>"Visualiser un message"]);
        $this->router->post($this->container->get("admin.prefix")."/messagerie/action:searchMessagerie", MessagerieAdminControl::class, ["name"=>"admin.messagerie.index.post.searchMessagerie", "icon"=>"fa fa-search", "title"=>"Rechercher des messages", "description"=>"Rechercher des messages"]);          

        $this->router->post($this->container->get("admin.prefix")."/messagerie/action:deleteMessagerie/id:([0-9]*)", MessagerieAdminPostControl::class, ["name"=>"admin.messagerie.index.post.deleteMessagerie", "icon"=>"fa fa-save", "title"=>"Supprimer un message", "description"=>"Supprimer un message"]);          

    }

}
