<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_realtimes;

// classes importées

use aeCorp\aec_src\aec_modules\aec_realtimes\aec_controls\RealTimesControl;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class RealtimesModule extends ModulesAbstract
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

        //Historique
        $this->router->get("/realtimes_event", RealTimesControl::class, ["name"=>"admin.realtimes.index", "description"=>"Gestion du temps reel des notifications"]);

    }

}
