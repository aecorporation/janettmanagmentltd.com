<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_emailsender;

// classes importées

use aeCorp\aec_src\aec_modules\aec_emailsender\aec_subscribers\EmailEventSubscriber;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class EmailsenderModule extends ModulesAbstract
{

    use ModuleTrait;

    // Definition si necessaire de fichier de configuration spécifique
    const DEFINITION = [__DIR__ . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php"];
    
    // Definition des routes relatives au module de l'application
    public function __construct(ContainerInterface $container){
        parent::__construct($container);

        $this->eventManager->addEventSubscriber($this->container->get(EmailEventSubscriber::class));

    }

}
