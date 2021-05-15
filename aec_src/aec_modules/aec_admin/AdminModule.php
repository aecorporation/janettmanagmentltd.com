<?php

namespace aeCorp\aec_src\aec_modules\aec_admin;

use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\aec_admin\aec_controls\AdminControl;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class AdminModule extends ModulesAbstract
{
    use ModuleTrait;

    // Definition si necessaire de fichier de configuration spécifique
    const DEFINITION = [__DIR__ . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php"];
    const MIGRATION = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_migrations";
    const SEED = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_seeds";
    

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);

        //TABLEAU DE BORD
        $this->router->get($this->container->get("admin.prefix"), AdminControl::class, ["name"=>"admin.dashbord.index", "icon"=>"fa fa-table", "title"=>"ACCUEIL", "description"=>"ACCUEIL"]);
    
        }

}
