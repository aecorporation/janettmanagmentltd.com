<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_loginadmin;

// classes importées

use aeCorp\aec_src\aec_modules\aec_loginadmin\aec_controls\LoginAdminControl;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ModulesAbstract;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class LoginAdminModule extends ModulesAbstract
{

    // Definition si necessaire de fichier de configuration spécifique
    const DEFINITION = [__DIR__ . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php"];

    // Definition des routes relatives au module de l'application
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->router->get($container->get("login.admin"), LoginAdminControl::class, ["name"=>"loginAdmin.get.index", "description"=>"Connexion administrateur"]);
        $this->router->post($container->get("login.admin")."/action:connect", LoginAdminControl::class, ["name"=>"loginAdmin.post.connect", "description"=>"Connexion administrateur"]);
    }

}
