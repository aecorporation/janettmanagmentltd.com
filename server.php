<?php

namespace aeCorp;

header("Access-Control-Allow-Origin:http://www.admin.divineoreole.com/realtimes_event/*", false);
header("Content-Type:text/event-stream");
header("Cache-Control:no-cache");

date_default_timezone_set('UTC');
ignore_user_abort(TRUE);
set_time_limit(0);


use aeCorp\aec_src\App;
use aeCorp\aec_core\Autoload;
use aeCorp\aec_src\aec_modules\aec_admin\aec_config\RouterPrefixAdminMiddleware;
use aeCorp\aec_src\aec_modules\aec_profilclient\aec_config\RouterProfilClientMiddleware;
use aeCorp\aec_src\aec_modules\aec_realtimes\RealtimesModule;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_factory\Container;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_specs\aec_middlewares\ForBiddenMiddleware;

use aeCorp\aec_utils\aec_middlewares\{
CsrfMiddleware,
RemoveSlashUrl,
RouterMiddleware,
DispatcherMiddleware,
    LengthDataMiddleware,
    NotFoundUrl,
    RouterPrivilegeMiddleware
};

// Charger l'autoloader...
//require dirname(__DIR__)."/aec_core/Autoload.php";
//Autoload::LOADER();

//Autoloader de composer

$root = __DIR__;

require $root."/vendor/autoload.php";

// Creer l'application
$app = Create::factory(App::class)

// Ajouter les dependances function neccessaire pour le fonctionnement de l'application
->addDependancy(ContainerInterface::class, Create::factory(Container::class,[
                        [
                         $root . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php",
                         $root . DIRECTORY_SEPARATOR . "aec_src" . DIRECTORY_SEPARATOR ."aec_specs" . DIRECTORY_SEPARATOR ."aec_config" . DIRECTORY_SEPARATOR . "config.php"
                        ]
                    ])
                )
->addModule(RealtimesModule::class)

//Demarrer l'application

        ->pipe(RemoveSlashUrl::class)
        ->pipe(ForBiddenMiddleware::class)
        ->pipe(LengthDataMiddleware::class)
        ->pipe(CsrfMiddleware::class)
        // Profil
        //->pipe(RouterProfilClientMiddleware::class) 
        // Admin
        // ->pipe(RouterPrefixAdminMiddleware::class)
        ->pipe(RouterMiddleware::class)
        ->pipe(RouterPrivilegeMiddleware::class)
        ->pipe(DispatcherMiddleware::class)
        ->pipe(NotFoundUrl::class);

if(php_sapi_name()!=="cli"){
    $app->run();
    return;
}