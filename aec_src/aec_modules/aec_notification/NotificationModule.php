<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_notification;

// classes importées

use aeCorp\aec_src\aec_modules\aec_notification\aec_subscribers\NotificationEventSubscriber;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\aec_notification\aec_controls\NotificationAdminControl;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class NotificationModule extends ModulesAbstract
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

        $this->eventManager->addEventSubscriber($this->container->get(NotificationEventSubscriber::class));

        //NOTIFICATION
        $this->router->get($this->container->get("admin.prefix")."/notification", NotificationAdminControl::class, ["name"=>"admin.notification.index", "description"=>"Gestion des notifications"]);
        $this->router->post($this->container->get("admin.prefix")."/notification/action:searchNotification", NotificationAdminControl::class, ["name"=>"admin.notification.index.post.searchNotification", "description"=>"Rechercher des notifications"]);
    }

}
